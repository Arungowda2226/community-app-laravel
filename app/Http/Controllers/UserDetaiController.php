<?php

namespace App\Http\Controllers;

use App\Models\user_detai;
use App\Models\businessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\family_details;




class UserDetaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = Auth::id();
      $userDetails=user_detai::simplePaginate(10);
      $family_details=family_details::where('user_id', $user_id)->count();
      $business_details=businessDetails::where('user_id', $user_id)->count();
      return view('frontend.allMemberList', compact('userDetails','family_details','business_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBusinessDetails($userId)
    {
        $Details = businessDetails::where('user_id', $userId)->get();

        if ($Details->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => ' details not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'Details' => $Details,
        ], 200);    
    }

    public function getFamilyDetails($userId)
    {
        // Retrieve the family details for the given user ID
        $familyDetails = family_details::where('user_id', $userId)->get();

        if ($familyDetails->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Family details not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'familyDetails' => $familyDetails,
        ], 200);
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
            'inputs.*.father_name' => 'required'
        ], [
            'inputs.*.father_name' => 'The father_name field is required'
        ]);

        $user_id = Auth::id();

        foreach ($request->inputs as $key => $value) {
            $value['user_id'] = $user_id; 

            user_detai::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_detai  $user_detai
     * @return \Illuminate\Http\Response
     */
    public function show(user_detai $user_detai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_detai  $user_detai
     * @return \Illuminate\Http\Response
     */
    public function edit(user_detai $user_detai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_detai  $user_detai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_detai $user_detai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_detai  $user_detai
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_detai $user_detai)
    {
        //
    }
}
