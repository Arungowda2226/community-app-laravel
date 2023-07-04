<?php

namespace App\Http\Controllers;

use App\Models\businessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BusinessDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businessDetails=businessDetails::simplePaginate(2);
        return view('frontend.memberList', compact('businessDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business=businessDetails::all()->toArray();
        return view('resources.views.frontend.user.account.tabs.business',compact('business'));
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
        'inputs.*.organisation_name' => 'required'
        ], [
            'inputs.*.organisation_name' => 'The organisation_name field is required'
        ]);

        $user_id = Auth::id();

        foreach ($request->inputs as $key => $value) {
            $value['user_id'] = $user_id; 

            businessDetails::create($value);
        }

        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
public function show($id)
{
    $business = businessDetails::find($id);
    if (!$business) {
        return response()->json([
            'status' => 404,
            'message' => 'Business not found',
        ], 404);
    }
    
    return response()->json([
        'status' => 200,
        'business' => $business,
    ]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(businessDetails $businessDetails)
    {
        $user_id = Auth::id();
        $businessDetails = businessDetails::where('user_id', $user_id)->get();
        return view('frontend.user.account.tabs.business', compact('businessDetails'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, businessDetails $businessDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(businessDetails $businessDetails)
    {
        //
    }
}
