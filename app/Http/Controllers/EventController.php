<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('frontend.event');
        
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
    $user_id = Auth::id();

    foreach ($request->inputs as $key => $value) {
        // Handle file upload
        if ($request->hasFile('inputs.'.$key.'.photo')) {
            $file = $request->file('inputs.'.$key.'.photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 'public');
            $value['photo'] = $path;
        }

        $value['invitation'] = $request->input('inputs.'.$key.'.invitation');
        $value['registration_required'] = $request->input('inputs.'.$key.'.registration');
        $value['user_id'] = $user_id;

        event::create($value);
    }

    // Store the values in the database as needed

    return redirect('/event')->with('flash_message', 'Event added successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        $eventList=event::paginate(1);
        return view('frontend.eventList',compact('eventList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }
}
