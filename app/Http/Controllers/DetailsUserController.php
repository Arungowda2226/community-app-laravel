<?php

namespace App\Http\Controllers;

use App\Models\details_user;
use Illuminate\Http\Request;

class DetailsUserController extends Controller
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
     * @param  \App\Models\details_user  $details_user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,details_user $details_user)
    {
          $request->validate([
            'inputs.*.name' => 'required'
        ], [
            'inputs.*.name.required' => 'The Name field is required'
        ]);

        $user_id = Auth::id();

        foreach ($request->inputs as $value) {
            $value['user_id'] = $user_id; // Set the user_id value

            details_user::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\details_user  $details_user
     * @return \Illuminate\Http\Response
     */
    public function edit(details_user $details_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\details_user  $details_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, details_user $details_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\details_user  $details_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(details_user $details_user)
    {
        //
    }
}
