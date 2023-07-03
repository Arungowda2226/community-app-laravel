<?php

namespace App\Http\Controllers;

use App\Models\family_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FamilyDetailsController extends Controller
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
        $detail = family_details::all(); // Fetch the family details from the database
        return view('frontend.user.account.tabs.familyDetails', ['detail' => $detail]);
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

            family_details::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\family_details  $family_details
     * @return \Illuminate\Http\Response
     */
    public function show(family_details $family_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\family_details  $family_details
     * @return \Illuminate\Http\Response
     */
    public function edit(family_details $family_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\family_details  $family_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, family_details $family_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\family_details  $family_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(family_details $family_details)
    {
        //
    }
}
