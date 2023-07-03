<?php

namespace App\Http\Controllers;

use App\Models\CheckUsers;
use Illuminate\Http\Request;

class CheckUsersController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckUsers  $checkUsers
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,CheckUsers $checkUsers)
    {
              $request->validate([
            'inputs.*.name' => 'required'
        ], [
            'inputs.*.name.required' => 'The Name field is required'
        ]);

        $user_id = Auth::id();

        foreach ($request->inputs as $value) {
            $value['user_id'] = $user_id; // Set the user_id value

            CheckUsers::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckUsers  $checkUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckUsers $checkUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckUsers  $checkUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckUsers $checkUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckUsers  $checkUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckUsers $checkUsers)
    {
        //
    }
}
