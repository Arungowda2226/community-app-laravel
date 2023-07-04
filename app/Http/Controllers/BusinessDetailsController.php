<?php

namespace App\Http\Controllers;

use App\Models\businessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;



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
    $data = Cache::get('business_details');
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
    public function update(Request $request, businessDetails $businessDetails,$id)
    {
        $businessEdit=businessDetails::find($id);
        return view('frontend.user.account.tabs.edit',compact('businessEdit'));
    }

public function updateBus(Request $request, businessDetails $businessDetails, $id)
{
    $businessUpdate = businessDetails::find($id);
    $businessUpdate->organisation_name = $request->input('inputs.0.OrganisationName');
    $businessUpdate->organisation_address = $request->input('inputs.0.OrganisationAddress');
    $businessUpdate->organisation_state = $request->input('inputs.0.OrganisationState');
    $businessUpdate->organisation_city = $request->input('inputs.0.OrganisationCity');
    $businessUpdate->organisation_country = $request->input('inputs.0.OrganisationCountry');
    $businessUpdate->organisation_phone = $request->input('inputs.0.OrganisationPhone');
    $businessUpdate->organisation_email = $request->input('inputs.0.OrganisationEmail');
    $businessUpdate->organisation_photos = $request->input('inputs.0.OrganisationPhotos');

    $businessUpdate->update();
    return redirect('/')->with('status', 'Data updated successfully');
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
