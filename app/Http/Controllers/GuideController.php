<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['guides'] = Guide::paginate(10)
            ->through(fn ($item) => [
                "id" => $item->id,
                "title" => $item->title,
                "description" => $item->description,
                "user" => $item->user->username
            ]);
        return view('admin.guides.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guide = new Guide;
        $guide->title=$request->title;
        $guide->description=$request->description;
        $guide->content=$request->content;
        $guide->user_id=Auth::user()->id;
        $result=$guide->save();
        if ($result) {
            return redirect('/admin/guides/create')->with('success', "L'article s'ha creat correctament");
        } else {
            return redirect('/admin/guides/create')->with('message', "Hi ha hagut algun error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        return view('guest.guides.view', ['guide' => $guide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        return view('admin.guides.edit', ['guide' => $guide]);
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
        $guide = Guide::findOrFail($id);
        $result = $guide->delete();

        if ($result) {
            return redirect('/admin/guides')->with('success', 'Article esborrat!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPublic()
    {
        $data['guides'] = Guide::paginate(10)
        ->through(fn ($item) => [
            "id" => $item->id,
            "title" => $item->title,
            "description" => $item->description,
            "user" => $item->user->username
        ]);
        
        return view('guest.guides.index', $data);
    }
}
