<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Breakdown;
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
            $data['departments'] = Department::paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "name" => $item->name,
              ]);
                return view('admin.departments.index', $data);
        }else{
            $data['departments'] = Department::where('user_id', '=', $idUser)
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
        //
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
}