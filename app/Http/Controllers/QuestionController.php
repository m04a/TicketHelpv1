<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Message;
use App\Models\User;
use App\Models\Department;
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

            if (Auth::user()->department_id) {
                $questionDepartment1 = Question::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $questionDepartment1 = Question::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }
            
            $data['unassigned'] = $questionDepartment1->where('status', 1)
            ->paginate(5, ["*"], "unassigned")
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "status" => $item->status,
                "department_id" => $item->department->name,
                "user_id" => $item->user->username,
            ]);

            if (Auth::user()->department_id) {
                $questionDepartment2 = Question::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $questionDepartment2 = Question::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }

            $data['assigned'] = $questionDepartment2->where('status', 2)
            ->paginate(5, ["*"], "assigned")
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "status" => $item->status,
                "department_id" => $item->department->name,
                "user_id" => $item->user->username,
                "manager_id" => $item->manager->username,
            ]);

            if (Auth::user()->department_id) {
                $questionDepartment3 = Question::where('department_id', Auth::user()->department_id)->orderBy('created_at', 'DESC');
            } else {
                $questionDepartment3 = Question::where('id', '>', '0' )->orderBy('created_at', 'DESC');
            }

            $data['done'] = $questionDepartment3->where('status', 3)
            ->paginate(5, ["*"], "done")
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
            ->orderBy('created_at', 'DESC')
            ->paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "status" => $item->status,
                "department_id" => $item->department->name,
                "user_id" => $item->user->username,
                "manager_id" => optional($item->manager)->username,
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
        
        $department = Department::all();

        $manager = User::where('role_id',3)
        ->orWhere('role_id',2)
        ->orderBy('role_id')->get();

        $idUser = $request->user()->id;

        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){
            return view('admin/questions/create', ['departament' => $department, 'manager' => $manager]);
        } else {
            return view('user/questions/create', ['departament' => $department, 'manager' => $manager]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //
        $idUser = Auth::user()->id;
        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){

            $questions = new Question;

            $questions->title = $request->title;
            $questions->description = $request->description;
            $questions->status = 1;
            $questions->department_id = $request->department_id;
            $questions->user_id = $idUser;

            if($questions->save()){
                return redirect('admin/questions/create')->with('success', "S'ha creat la pergunta correctament!");
            }
        } else {
            $questions = new Question;

            $questions->title = $request->title;
            $questions->description = $request->description;
            $questions->status = 1;
            $questions->department_id = $request->department_id;
            $questions->user_id = $idUser;

            if($questions->save()){
                return redirect('user/questions/create')->with('success', "S'ha creat la pergunta correctament!");
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
        //
        $idUser = Auth::user()->id;
        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){

            $questions = Question::findOrFail($id);

            $questions['username'] = $questions->user->username;

            $questions['department'] = $questions->department->name;

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

            return view('admin.questions.view', ['questions' => $questions, 'messages' => $messages]);
        } else {

            $questions = Question::findOrFail($id);

            $questions['username'] = $questions->user->username;

            $questions['department'] = $questions->department->name;

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

            return view('user.questions.view', ['questions' => $questions, 'messages' => $messages]);
        }
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
        $idUser = Auth::user()->id;
        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){

            $questions = Question::where('id', $id)->first();

            $departments = Department::all();

            $manager = User::where('role_id',3)
            ->orWhere('role_id',2)
            ->orderBy('role_id')->get();

            $departments = Department::all();

            return view('admin.questions.edit' , ['departments' => $departments, 'manager' => $manager])->with('questions',$questions);

        } else {
            $questions = Question::where('id', $id)->first();

            $manager = User::where('role_id',3)
            ->orWhere('role_id',2)
            ->orderBy('role_id')->get();

            $departments = Department::all();

            return view('user.questions.edit' , ['departments' => $departments, 'manager' => $manager])->with('questions',$questions);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        //
        $idUser = Auth::user()->id;
        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){

            $questions = Question::findOrFail($id);

            $questions->title = $request->title;
            $questions->description = $request->description;
            $questions->status = $request->status;
            $questions->department_id = $request->department_id;
            $questions->manager_id = $request->manager;

            if ($questions->status == 1) {
                $questions->status = 2;
            } else {
                $questions->status = $request->status;
            }

            if($questions->save()){
                return back()->with('success',"La Pregunta S'ha actualizat correctament");
            }

        } else {
            $questions = Question::findOrFail($id);

            $questions->title = $request->title;
            $questions->description = $request->description;
            $questions->department_id = $request->department_id;
            $questions->manager_id = $request->manager;

            if($questions->save()){
                return back()->with('success',"La pregunta s'ha actualizat correctament");
            }

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
        //
        $idUser = Auth::user()->id;
        $userRole = User::where('id', '=', $idUser)->get(['role_id']);

        if ($userRole[0]['role_id'] > 1){

            $question = Question::findOrFail($id);

            $result = $question->delete();

            if ($result) {
                return redirect('admin/questions')->with('success', 'Pregunta esborrada!');
            }

            return redirect('admin/questions')->with('error', 'Error inesperat. Contacti amb l\'administrador del lloc');

        } else {
            $question = Question::findOrFail($id);

            $result = $question->delete();
            if($question['user_id'] == $idUser){
                if ($result) {
                    return redirect('user/questions/list')->with('success', 'Pregunta esborrada!');
                }
            }

            return redirect('user/questions/list')->with('error', 'Error inesperat. Contacti amb l\'administrador del lloc');

        }
    }

    /**
     * Retun values in json array for Angular graphic. 
     *
     * 
     * 
     * @return @return json_encode($array)
     */
    public function graph7()
    {
        $standby = Question::where("status", 1)->count();

        $inprocess = Question::where("status", 2)->count();

        $resolveds = Question::where("status", 3)->count();

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
