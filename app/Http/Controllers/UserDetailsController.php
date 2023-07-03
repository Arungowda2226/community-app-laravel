<?php

namespace App\Http\Controllers;

use App\Models\user_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDetailsController extends Controller
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
         $request->validate([
            'inputs.*.name' => 'required'
        ], [
            'inputs.*.name' => 'The Name field is required'
        ]);

        $user_id = Auth::id();

        foreach ($request->inputs as $key => $value) {
            $value['user_id'] = $user_id; 

            user_details::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function show(user_details $user_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function edit(user_details $user_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_details $user_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_details  $user_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_details $user_details)
    {
        //
    }
}
