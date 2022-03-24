<?php

namespace App\Http\Controllers;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\Breakdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MessageRequest $request, $id)
    {
        $message = new Message;
        $message->content=$request->content;
        $message->user_id=Auth::user()->id;
        $message->breakdown_id=$id;
        $message->question_id=NULL;
        if ($message->save()) {
            return back()->with('success', "El missatge ha sigut enviat");
        } else {
            return back()->with('message', "Hi ha hagut algun error");
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
        $Message = Message::findOrFail($id);

        if ($Message->delete()) {
            return back()->with('message', 'Missatge esborrat!');
        } else {
            return back()->with('message', 'Hi hagut un error al esborrar el missatge!');
        }
    }
}
