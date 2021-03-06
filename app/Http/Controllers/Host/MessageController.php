<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        $place->load('messages');
        $messages = $place->messages;

        return view ('host.places.messages.index', compact('place', 'messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //front-office
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //front-office
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($place_id, $msg_id)
    {
        // dd($msg_id);
        // dd($place_id);
        $message = Message::where('id', $msg_id)->with(['place'])->first();
        // dd($message);
        $place = Place::where('id', $place_id)->first();

        return view('host.places.messages.show', compact('place', 'message') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //eventualmente front-office
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
        //eventualmente front-office
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place, $msg_id)
    {
        // dd($place);
        // dd($msg_id);
        $message = Message::where('id', $msg_id)->get();
        // dd($message);
        $message->each->delete();

        return redirect()->route('host.places.messages.index', $place);
        // return redirect()->back();
    }
}
