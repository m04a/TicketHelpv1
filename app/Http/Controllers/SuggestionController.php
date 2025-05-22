<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuggestionRequest;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Admin/Moderator specific logic
        // Assumes 'moderator' middleware has run.
        if (Auth::user()->department_id != null) {
            $suggestionSource = Suggestion::where('department_id', Auth::user()->department_id);
        } else {
            $suggestionSource = Suggestion::where('id', '>', '0'); // Effectively all suggestions
        }

        $data['suggestions'] = $suggestionSource->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "department" => $item->department->name,
            ]);
        
        // This count might be for all suggestions, adjust if it should be department specific for admins
        $data['suggestionsCount'] = Suggestion::count(); 
        return view('admin.suggestions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Admin/Moderator specific logic
        // Assumes 'moderator' middleware has run.
        $department = Department::all();
        return view('admin.suggestions.create', ['department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuggestionRequest $request)
    {
        // Admin/Moderator specific logic (or can be common if user_id is always Auth::user()->id)
        // Assumes 'moderator' middleware for admin path, 'auth' for user path.
        // For admin, user_id is still the admin creating it.
        $suggestion = new Suggestion();
        $suggestion->title = $request->title;
        $suggestion->department_id = $request->department_id;
        $suggestion->description = $request->description;
        $suggestion->user_id = Auth::user()->id; // The admin/mod who submitted it

        if($suggestion->save()){
             // Admin path redirect
             return redirect()->route('admin.suggestions.index')->with('success', 'La suggerència ha sigut enviada!');
        }else{
             // Admin path redirect with error
             return redirect()->route('admin.suggestions.create')->with('error', "La suggerència no s'ha pogut crear.");
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
        // This method appears to be admin-only already.
        // No role check needed if accessed via admin-only route.
        $suggestion = Suggestion::findOrFail($id);
        // Optional: Add authorization check if admins from one dept cannot see suggestions from another, if applicable.
        return view('admin.suggestions.view', ['suggestions' => $suggestion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request) // Request object not used here for role, assuming Auth::user()
    {
        // Admin/Moderator specific logic
        // Assumes 'moderator' middleware has run.
        $suggestion = Suggestion::findOrFail($id);
        // Optional: Authorization check for department if needed.
        $department = Department::all();
        return view('admin.suggestions.edit', ['suggestion' => $suggestion, 'department' => $department]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuggestionRequest $request, $id)
    {
        // Admin/Moderator specific logic
        // Assumes 'moderator' middleware has run.
        $suggestion = Suggestion::findOrFail($id); // Use findOrFail
        // Optional: Authorization check for department if needed.

        $suggestion->title = $request->title;
        $suggestion->department_id = $request->department_id;
        $suggestion->description = $request->description;
        // user_id should typically not be changed on update, or only by super-admin.
        // $suggestion->user_id = Auth::user()->id; // This would change owner to editor. Usually not desired.

        if($suggestion->save()){
            return back()->with('success', "S'han actualitzat les dades de la suggerència.");
        } else {
            return back()->with('error', "No s'han pogut actualitzar les dades de la suggerència.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) // Request object not used here for role, assuming Auth::user()
    {
        // Admin/Moderator specific logic
        // Assumes 'moderator' middleware has run.
        $suggestion = Suggestion::findOrFail($id);
        // Optional: Authorization check for department if needed.
        
        if ($suggestion->delete()) { // Simplified delete result check
            return redirect()->route('admin.suggestions.index')->with('success', 'Suggerència esborrada!');
        }else{
            return redirect()->route('admin.suggestions.index')->with('error', 'Hi hagut un error al esborrar la suggerència!');
        }
    }

    // User-specific methods start here

    public function userIndex(Request $request)
    {
        $suggestions = Suggestion::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
            ]);
        return view('user.suggestions.list', ['suggestions' => $suggestions]);
    }

    public function userCreate(Request $request)
    {
        $department = Department::all();
        return view('user.suggestions.create', ['department' => $department]);
    }

    public function userStore(SuggestionRequest $request)
    {
        $suggestion = new Suggestion();
        $suggestion->title = $request->title;
        $suggestion->department_id = $request->department_id;
        $suggestion->description = $request->description;
        $suggestion->user_id = Auth::user()->id;

        if($suggestion->save()){
            return redirect()->route('user.suggestions.create')->with('success', 'La suggerència ha sigut enviada!');
        }else{
            return redirect()->route('user.suggestions.create')->with('error', "La suggerència no s'ha pogut crear.");
        }
    }

    public function userEdit($id)
    {
        $suggestion = Suggestion::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail();
        $department = Department::all();
        // Original view passed ['suggestion' => $suggestion], ['department' => $department]
        // Correct way is a single array: ['suggestion' => $suggestion, 'department' => $department]
        return view('user.suggestions.edit', ['suggestion' => $suggestion, 'department' => $department]);
    }

    public function userUpdate(SuggestionRequest $request, $id)
    {
        $suggestion = Suggestion::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail();
        $suggestion->title = $request->title;
        $suggestion->department_id = $request->department_id;
        $suggestion->description = $request->description;

        if($suggestion->save()){
            return back()->with('success', "S'han actualitzat les dades de la suggerència.");
        } else {
            return back()->with('error', "No s'han pogut actualitzar les dades de la suggerència.");
        }
    }

    public function userDestroy($id)
    {
        $suggestion = Suggestion::where('id', $id)
                                ->where('user_id', Auth::user()->id)
                                ->firstOrFail();
        if ($suggestion->delete()) {
            return redirect()->route('user.suggestions.list')->with('success', 'Suggeriment esborrat!');
        }else{
            return redirect()->route('user.suggestions.list')->with('error', 'Hi hagut un error al esborrar la suggerència!');
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
    public function graph5()
    {
        $suggestions = Department::withCount("suggestions")->get()
        ->map(fn ($item) => [
            "name"=>$item->name,
            "value"=>$item->suggestions_count
        ]);
        return response()->json($suggestions);
    }
}
