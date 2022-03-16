<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Role;

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
            $data['suggestions'] = Suggestion::paginate(5)
            ->through(fn ($item) => [
              "id" => $item->id,
              "title" => $item->title,
              "description" => $item->description,
              ]);
                return view('admin.suggestions.index', $data);
        }else{
            $data['suggestions'] = Suggestion::where('user_id', '=', $idUser)
            ->paginate(5)
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $suggestion = Suggestion::findOrFail($id);

            return view('admin.suggestions.edit', ['suggestion' => $suggestion]);

        }else{

            $suggestion = Suggestion::findOrFail($id);

            return view('user.suggestions.edit', ['suggestion' => $suggestion]);
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
                return redirect('/admin/suggestions')->with('message', 'Sugerencia esborrada!');
            }else{
                return redirect('/admin/suggestions')->with('message', 'hi hagut un error al esborrar la sugerencia!');
            }
        }else{
            $suggestion = Suggestion::findOrFail($id);

            $result = $suggestion->delete();
            
            if ($result) {
                return redirect('/user/suggestions/list')->with('message', 'Sugerencia esborrada!');
            }else{
                return redirect('/user/suggestions/list')->with('message', 'hi hagut un error al esborrar la sugerencia!');
            }
        }
    }
}
