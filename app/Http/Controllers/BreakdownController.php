<?php

namespace App\Http\Controllers;

use App\Http\Requests\BreakdownRequest;
use App\Models\Breakdown;
use App\Models\Device;
use App\Models\User;
use App\Models\Department;
use App\Models\Message;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BreakdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $userid = $breakdown['breakdown']->user_id;
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user,
        // typically via a route protected by 'moderator' middleware (e.g., /admin/breakdowns).
        // Functionality for regular users (previously in the 'else' block, e.g. /user/breakdowns/list)
        // will no longer be served by this method and requires separate routing/controller actions.

        if (Auth::user()->department_id != null) {
            $breakdownDepartment1 = Breakdown::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $breakdownDepartment1 = Breakdown::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }
            
            $breakdown['unassigned'] = $breakdownDepartment1->where('status', 1)
            ->paginate(10, ["*"], "unassigned")
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "department" => $item->department->name,
                "aula" => $item->zone->label,
            ]);

            if (Auth::user()->department_id != null) {
                $breakdownDepartment2 = Breakdown::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $breakdownDepartment2 = Breakdown::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }

            $breakdown['assigned'] = $breakdownDepartment2->where('status', 2)
            ->orderBy('created_at', 'DESC')
            ->paginate(10, ["*"], "assigned")
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "department" => $item->department->name,
                "aula" => $item->zone->label,
                "manager" => optional($item->manager)->username
            ]);

            if (Auth::user()->department_id != null) {
                $breakdownDepartment3 = Breakdown::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $breakdownDepartment3 = Breakdown::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }

            $breakdown['done'] = $breakdownDepartment3->where('status', 3)
            ->paginate(10, ["*"], "done")
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "department" => $item->department->name,
                "aula" => $item->zone->label,
                "manager" => optional($item->manager)->username
            ]);
        
        return view('admin.breakdowns.index',$breakdown);
    }

    public function filter()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user.
        // Functionality for regular users (previously in the 'else' block)
        // will no longer be served by this method.

        $department = Department::all();

        // For admin/moderator, it's typical to show all devices or devices based on broader criteria
        // The original logic for devices was:
        // if(Auth::user()->zone_id != null) { $devices = Device::where('zone_id', Auth::user()->zone_id)->get(); } 
        // else { $devices = Device::all(); }
        // For an admin/moderator view, providing all devices seems more appropriate.
        // If zone-specific devices are needed for admins, that logic can be retained or adjusted.
        // Here, we'll assume admins/mods should see all devices.
        $devices = Device::all();
        
        $zones = Zone::all();
        $manager = User::where('role_id', 3)->orderBy('role_id')->get(); // For selecting a manager, typically admin role
        $userLoggedIn = Auth::user()->username;
        
        return view('admin.breakdowns.create',
            [
                'department' => $department,
                'manager' => $manager,
                'devices' => $devices,
                'zones' => $zones,
            ]
        )->with('userLoggedIn', $userLoggedIn);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreakdownRequest $request)
    {
        // Role check 'if (Auth::user()->role_id > 1)' and 'else' block removed.
        // The core logic for creating a breakdown is identical for all authenticated users.
        // The method assumes it's accessed by an authorized user (via 'auth' or more specific middleware).

        $breakdown = new Breakdown();

        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->department_id = $request->department_id;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        $breakdown->status = 1; // Default status for new breakdowns

        /* Obtain the user currently logged */
        $breakdown->user_id = Auth::user()->id;
    
        if($breakdown->save()){
            // Using a common success message
            return back()->with('success',"S'ha creat la incidència satisfactòriament.");
        } else {
            // Optional: handle save failure
            return back()->with('error', "No s'ha pogut crear la incidència.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user
        // (e.g., via /admin/breakdowns/view/{id}).
        // The user-specific view path is removed.
        
        $breakdownData = Breakdown::findOrFail($id);

        $breakdown = [
                "id" => $breakdownData->id,
                "title" => $breakdownData->title,
                "status" => $breakdownData->status,
                "description" => $breakdownData->description,
                "username" =>$breakdownData->user->username,
                "departament" =>$breakdownData->department->name,
                "zone_name" =>$breakdownData->zone->label,
                "device_name" =>$breakdownData->device->label
        ];

        if (isset($breakdownData->manager_id)) {
            $breakdown["manager_username"] = $breakdownData->manager->username;
        } else {
            $breakdown["manager_username"] = "No assignat";
        }

        $messages = Message::where('breakdown_id', $breakdown['id'])->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'content' => $item->content,
                'user' => $item->user->username,
            ]);

        // Always returns the admin view now.
        return view('admin.breakdowns.view')
        ->with('breakdown', $breakdown)
        ->with('messages', $messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user.
        // Functionality for regular users (previously in the 'else' block) is removed.

        $breakdownData = Breakdown::findOrFail($id); // Use findOrFail for immediate 404 if not found

        $department = Department::all();
        $devices = Device::all(); // Admins/moderators typically see all devices
        $zones = Zone::all();
        // Managers are assigned by admins/moderators
        $manager = User::whereIn('role_id', [2, 3])->orderBy('role_id')->get();
    
        // The following assignments were in the original code, modifying the model before view.
        // It's generally cleaner to pass the model and access properties in the view,
        // but retaining for consistency with original structure if these were specific view model preparations.
        $breakdownData->username = $breakdownData->user->username; // Accessing relation
        $breakdownData->departament = $breakdownData->department->name; // Accessing relation
    
        return view('admin.breakdowns.edit', [
            'department' => $department,
            'manager' => $manager,
            'devices' => $devices,
            'zones' => $zones,
            'breakdownData' => $breakdownData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BreakdownRequest $request, $id)
    {
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user.
        // It includes logic for updating fields like manager_id and status, which are admin/mod privileges.
        // User-specific update logic (typically more restricted) is removed from this method.

        $breakdown = Breakdown::findOrFail($id); // Use findOrFail

        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        $breakdown->department_id = $request->department_id;
        
        // Admin/Moderator can update manager and status
        // If manager_id is provided in the request, update it.
        if ($request->has('manager_id')) {
            $breakdown->manager_id = $request->manager_id;
            // If a manager is assigned to a previously unassigned (status 1) breakdown,
            // and status is not being explicitly set in this same request,
            // automatically move the breakdown to 'assigned' (status 2).
            if ($breakdown->status == 1 && !$request->has('status')) {
                $breakdown->status = 2;
            }
        }
        
        // If status is explicitly provided in the request, update it.
        // This allows admins/mods to directly control the status.
        if ($request->has('status')) {
            $breakdown->status = $request->status;
        }

        if($breakdown->save()){
            return back()->with('success',"S'han actualitzat les dades de la incidència.");
        } else {
            return back()->with('error',"No s'han pogut actualitzar les dades de la incidència.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Role check 'if (Auth::user()->role_id > 1)' and the corresponding 'else' block are removed.
        // This method now assumes it's accessed by an authorized moderator/admin user.
        // It allows deletion of any breakdown by ID.
        // User-specific deletion logic (own breakdown only) is removed from this method.

        $breakdown = Breakdown::findOrFail($id); // Use findOrFail for immediate 404 if not found

        if($breakdown->delete()){
            // Using a common success message
            return back()->with('success',"S'ha esborrat la incidència satisfactòriament.");
        } else {
            // Handle deletion failure, though less common if findOrFail succeeds
            return back()->with('error',"No s'ha pogut esborrar la incidència.");
        }
    }

    // User-specific methods start here

    public function userIndex(Request $request)
    {
        $breakdowns = Breakdown::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "status" => $item->status,
                "username" => $item->user->username,
                "manager" => optional($item->manager)->username,
                "department" => $item->department->name,
                "aula" => $item->zone->label,
            ]);
        // The original user list view name was 'user.breakdowns.list'
        // The $breakdown variable in the original was an array with a 'user' key.
        // For consistency with typical Laravel, passing $breakdowns directly is common.
        return view('user.breakdowns.list', ['breakdowns' => $breakdowns]);
    }

    public function userCreate()
    {
        $department = Department::all();
        if (Auth::user()->zone_id != null) {
            $devices = Device::where('zone_id', Auth::user()->zone_id)->get();
        } else {
            $devices = Device::all(); // Or a more restricted set, or empty if zone is required
        }
        $zones = Zone::all(); // Or potentially restricted to user's zone
        $userLoggedIn = Auth::user()->username; // Original code passed this

        return view('user.breakdowns.create', [
            'department' => $department,
            'devices' => $devices,
            'zones' => $zones,
            'userLoggedIn' => $userLoggedIn,
        ]);
    }

    public function userStore(BreakdownRequest $request)
    {
        // This logic is identical to the refactored store() method.
        // If store() is truly role-agnostic, this method might not be strictly needed
        // if routes can direct both user and admin to the same store() method.
        // However, creating it for explicitness as per task.
        $breakdown = new Breakdown();
        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->department_id = $request->department_id;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        $breakdown->status = 1; // Default status for new breakdowns
        $breakdown->user_id = Auth::user()->id;
    
        if($breakdown->save()){
            return back()->with('success',"S'ha creat la incidència satisfactòriament.");
        } else {
            return back()->with('error', "No s'ha pogut crear la incidència.");
        }
    }

    public function userShow($id)
    {
        // Adding an ownership check for security, assuming users can only see their own breakdowns.
        $breakdownData = Breakdown::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail();

        $breakdown = [
                "id" => $breakdownData->id,
                "title" => $breakdownData->title,
                "status" => $breakdownData->status,
                "description" => $breakdownData->description,
                "username" =>$breakdownData->user->username,
                "departament" =>$breakdownData->department->name,
                "zone_name" =>$breakdownData->zone->label,
                "device_name" =>$breakdownData->device->label
        ];

        if (isset($breakdownData->manager_id)) {
            $breakdown["manager_username"] = $breakdownData->manager->username;
        } else {
            $breakdown["manager_username"] = "No assignat";
        }

        $messages = Message::where('breakdown_id', $breakdown['id'])->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'content' => $item->content,
                'user' => $item->user->username,
            ]);

        return view('user.breakdowns.view') // User-specific view
            ->with('breakdown', $breakdown)
            ->with('messages', $messages);
    }

    public function userEdit($id)
    {
        $breakdownData = Breakdown::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail(); // Ensures user owns the breakdown

        $department = Department::all();
        if (Auth::user()->zone_id != null) {
            $devices = Device::where('zone_id', Auth::user()->zone_id)->get();
        } else {
            // Fallback for devices if user has no zone_id; adjust as per actual requirements
            $devices = Device::all(); 
        }
        $zones = Zone::all(); // Users might only need to see their own zone if selection is restricted

        // The original user 'edit' didn't usually involve selecting a manager.
        // $manager = User::whereIn('role_id', [2, 3])->orderBy('role_id')->get(); 
        
        // Original user edit view data structure
        $viewData = [
            'department' => $department,
            'devices' => $devices,
            'zones' => $zones,
            // 'manager' => $manager, // Typically not for users
        ];
        return view('user.breakdowns.edit', $viewData)->with('breakdownData', $breakdownData);
    }

    public function userUpdate(BreakdownRequest $request, $id)
    {
        $breakdown = Breakdown::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail(); // Ensures user owns the breakdown

        $breakdown->title = $request->title;
        $breakdown->description = $request->description;
        $breakdown->device_id = $request->device_id;
        $breakdown->zone_id = $request->zone_id;
        $breakdown->department_id = $request->department_id;
        // Users typically cannot change status or manager_id directly.
        // Status might change based on other workflows, but not directly by user here.

        if($breakdown->save()){
            return back()->with('success',"S'han actualitzat les dades de la incidència.");
        } else {
            return back()->with('error',"No s'han pogut actualitzar les dades de la incidència.");
        }
    }

    public function userDestroy($id)
    {
        $breakdown = Breakdown::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail(); // Ensures user owns the breakdown

        if($breakdown->delete()){
            return back()->with('success','Incidència esborrada satisfactòriament.');
        } else {
            return back()->with('error',"No s'ha pogut esborrar la incidència.");
        }
    }

    // User-specific methods end here

     /**
     * Retun values in json array for Angular graphic. 
     *
     * 
     * 
     * @return @return json_encode($array)
     */
    public function graph1()
    {

        $standby = Breakdown::where("status", 1)->count();

        $inprocess = Breakdown::where("status", 2)->count();

        $resolveds = Breakdown::where("status", 3)->count();

        return response()->json([
            [
                "name" => "Resoltes",
                "value" => $resolveds
            ],
            [
                "name" => "En procés",
                "value" => $inprocess
            ],
            [
                "name" => "Pendents",
                "value" => $standby
            ],
        ]);
    }
}
