<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Breakdown;
use App\Models\Message;
use App\Models\Suggestion;
use App\Models\Question;
use App\Models\User;
use App\Models\Role;


class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $data['departments'] = Department::orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "name" => $item->name,
              ]);
                return view('admin.departments.index', $data);
        }else{
            $data['departments'] = Department::where('user_id', '=', $idUser)
            ->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "name" => $item->name,
              ]);
                return view('user.departments.list', $data);
        }

        $data['departmentsCount'] = Department::count();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/departments/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            ["departament" => "required"
        ]);

        $departments = new Department();
        $departments->name = $validated["departament"];

        $departments->save();
        return redirect(route("admin.departments.index"));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breakdownData = Breakdown::findOrFail($id);

        $breakdown = [
                "id" => $breakdownData->id,
                "title" => $breakdownData->title,
                "status" => $breakdownData->status,
                "description" => $breakdownData->description,
                "username" =>$breakdownData->user->username,
                "departament" =>$breakdownData->department->name,
                "zone_name" =>$breakdownData->zone->label,
                "device_name" =>$breakdownData->device->label,
                "department_id" =>$breakdownData->department_id
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
        return view('admin.departments.view')
        ->with('breakdown', $breakdown)
        ->with('messages', $messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $department = Department::findOrFail($id);

            return view('admin.departments.edit', ['department' => $department]);

        }else{

            $department = Department::findOrFail($id);

            return view('user.departments.edit', ['department' => $department]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::find($id);

        $department->name = $request->name;

        if($department->save()){
            return back()->with('success',"S'han actualitzat les dades del departament.");
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
        $department = Department::find($id);

        // $breakdowns = Breakdown::where('department_id', $id)->count();
        // $questions = Question::where('department_id', $id)->count();
        // $suggestions = Suggestion::where('department_id', $id)->count();
        
        // $total = $breakdowns + $questions + $suggestions;

        if($department->delete()){
            return redirect("/admin/departments/")->with('success', "El departament s'ha esborrat satisfactoriament!");
        }else{
            return redirect("/admin/departments/")->with('error', "El departament no es pot borrar perqué te dependeciés!");
        }   
    }

    /**
     * Retun values in json array for Angular graphic.
     *
     * 
     * 
     * @return json_encode($array)
     */
    public function graph3(){

        $departments = Department::withCount('breakdowns')->get();
        $counter = 0;
        $departmentData = [];
        foreach ($departments as $department){
         $departmentData[$counter]['name'] = $departments[$counter]['name'];
         $departmentData[$counter]['value'] = $departments[$counter]['breakdowns_count'];
         $counter++;
        }
        return json_encode($departmentData);
     }

    /**
     * View index historic of department
     *
     * 
     * @param $id
     * @return view('name',($object),($object));
     */
     public function history($id){
        $history['history'] = Breakdown::where('department_id', $id)
        ->orderBy('created_at', 'DESC')
        ->paginate(10, ["*"], "history")
        ->through(fn ($item) => [
            "id" => $item->id,
            "title" => $item->title,
            "status" => $item->status,
            "username" => $item->user->username,
            "department" => $item->department->name,
            "aula" => $item->zone->label,
            "manager" => optional($item->manager)->username
        ]);

        $historyquestion['historyquestion'] = Question::where('department_id', $id)
        ->orderBy('created_at', 'DESC')
        ->paginate(10, ["*"], "history")
        ->through(fn ($item) => [
            "id" => $item->id,
            "title" => $item->title,
            "description" => $item->description,
            "status" => $item->status,
            "department_id" => $item->department->name,
            "user_id" => $item->user->username,
        ]);
    
        return view('admin.departments.history',$history,$historyquestion);
    }

    /**
     * Show question detail of department
     *
     * 
     * @param $id
     * @return view('name', ['name_value' => ($object), 'name_value' => ($object)]);
     */
    public function showquestion($id)
    {
        $questions = Question::findOrFail($id);

        $questions['username'] = $questions->user->username;
        
        $questions['department'] = $questions->department->name;
        
        $questions['department_id'] = $questions->department_id;
        
        if (isset($questions->manager->username)) {
            $questions["manager"] = $questions->manager->username;
        } else {
            $questions["manager"] = "No assignat";
        }

        $messages = Message::where('question_id', $questions['id'])->get()
        ->map(fn ($item) => [
            'id' => $item->id,
            'content' => $item->content,
            'user' => $item->user->username,
        ]);

        return view('admin.departments.view-question', ['questions' => $questions, 'messages' => $messages]);
    }
}