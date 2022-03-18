<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Role;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if($userRole[0]['role_id'] > 1){
            $data['questions'] = Question::paginate(5)
            ->through(fn ($item) => [
              "id" => $item->id,
              "title" => $item->title,
              "description" => $item->description,
              "status" => $item->status,
              "department_id" => $item->department->name,
              "user_id" => $item->user->username,
              "manager_id" => $item->manager->username,
              ]);
                return view('admin.questions.index', $data);
        }else{
            $data['questions'] = Question::where('user_id', '=', $idUser)
            ->paginate(5)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "status" => $item->status,
                "department_id" => $item->department->name,
                "user_id" => $item->user->username,
                "manager_id" => $item->manager->username,
              ]);
                return view('user.questions.list', $data);
        }

        $data['questionsCount'] = Question::count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){
            return view('admin/questions/create');
        } else {
            return view('user/questions/create');
        }

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
        $idUser = $request->user()->id;

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'department_id' => 'required',
        ]);

        $questions = new Question;

        $questions->title = $validated['title'];
        $questions->description = $validated['description'];
        $questions->status = '0';
        $questions->department_id = $validated['department_id'];
        $questions->user_id = $idUser;
        $questions->manager_id = '1';


        $questions->save();

        return view('/user/questions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $questions = Question::findOrFail($id);

        $questions['username'] = $questions->user->username;
        
        $questions['department'] = $questions->department->name;
        
        $questions['manager'] = $questions->manager->username;

        return view('admin.questions.view', ['questions' => $questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
        $question = Question::findOrFail($id);
        
        $result = $question->delete();
        
        if ($result) {
            return redirect('admin/questions')->with('message', 'Pregunta esborrada');
        }

        return redirect('admin/questions')->with('message', 'Error inesperat. Contacti amb l\'administrador del lloc');
    }
}
