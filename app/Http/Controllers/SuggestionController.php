<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuggestionRequest;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
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
            $data['suggestions'] = Suggestion::paginate(10)
            ->through(fn ($item) => [
              "id" => $item->id,
              "title" => $item->title,
              "description" => $item->description,
              ]);
                return view('admin.suggestions.index', $data);
        }else{
            $data['suggestions'] = Suggestion::where('user_id', '=', $idUser)
            ->paginate(10)
            ->through(fn ($item) => [
              "id" => $item->id,
              "title" => $item->title,
              "description" => $item->description,
              ]);
                return view('user.suggestions.list', $data);
        }

        $data['suggestionsCount'] = Suggestion::count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $department = Department::all();

        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            return view('admin.suggestions.create', ['department' => $department]);
        }else{
            return view('user.suggestions.create', ['department' => $department]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuggestionRequest $request)
    {
        $idUser = Auth::user()->id;

        $create = $request;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $suggestion = new Suggestion();

            $suggestion->title = $request->title;
            $suggestion->department_id = $request->department_id;
            $suggestion->description = $request->description;
            $suggestion->user_id = $idUser;

            if($suggestion->save()){
                 return redirect('/admin/suggestions/create')->with('success', 'La suggerencia a sigut enviada!');
            }else{
                return redirect('/user/suggestions/create')->with('error', "La suggerencia no s'ha pogut crear");
            }

        }else{

            $suggestion = new Suggestion();

            $suggestion->title = $request->title;
            $suggestion->department_id = $request->department_id;
            $suggestion->description = $request->description;
            $suggestion->user_id = $idUser;

            if($suggestion->save()){
                return redirect('/user/suggestions/create')->with('success', 'La suggerencia a sigut enviada!');;
            }else{
                return redirect('/user/suggestions/create')->with('error', "La suggerencia no s'ha pogut crear");
            }
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
        $suggestion = Suggestion::findOrFail($id);

        return view('admin.suggestions.view', ['suggestions' => $suggestion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $department = Department::all();

        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $suggestion = Suggestion::findOrFail($id);

            return view('admin.suggestions.edit', ['suggestion' => $suggestion],['department' => $department]);

        }else{

            $suggestion = Suggestion::findOrFail($id);

            return view('user.suggestions.edit', ['suggestion' => $suggestion],['department' => $department]);
        }
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

        $idUser = Auth::user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);
        
        if($userRole[0]['role_id'] > 1){
            $suggestion = Suggestion::find($id);
            /*Records to update with the request*/
            $suggestion->title = $request->title;
            $suggestion->department_id = $request->department_id;
            $suggestion->description = $request->description;
            $suggestion->user_id = $idUser;
    
            if($suggestion->save()){
                return back()->with('success', "S'han actualitzat les dades de la suggerencia.");
            } else {
                return back()->with('error', "No s'han pogut actualitzar les dades de la suggerencia.");
            }

        }else{
            $suggestion = Suggestion::find($id);
            /*Records to update with the request*/
            $suggestion->title = $request->title;
            $suggestion->department_id = $request->department_id;
            $suggestion->description = $request->description;
            $suggestion->user_id = $idUser;
    
            if($suggestion->save()){
                return back()->with('success', "S'han actualitzat les dades de la suggerencia.");
            } else {
                return back()->with('error', "No s'han pogut actualitzar les dades de la suggerencia.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $suggestion = Suggestion::findOrFail($id);+

            $result = $suggestion->delete();

            if ($result) {
                return redirect('/admin/suggestions')->with('success', 'Suggerencia esborrada!');
            }else{
                return redirect('/admin/suggestions')->with('error', 'Hi hagut un error al esborrar la suggerencia!');
            }
        }else{
            $suggestion = Suggestion::findOrFail($id);

            $result = $suggestion->delete();
            if($suggestion['user_id'] == $idUser){
                if ($result) {
                    return redirect('/user/suggestions/list')->with('success', 'Sugerencia esborrada!');
                }else{
                    return redirect('/user/suggestions/list')->with('error', 'Hi hagut un error al esborrar la suggerencia!');
                }
            }
        }
    }
}
