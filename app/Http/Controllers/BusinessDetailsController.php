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
            $user_id = Auth::id();
            $businessDetails = businessDetails::where('user_id', $user_id)->simplePaginate(2);
            return view('frontend.memberList', compact('businessDetails'));
        }

        public function allData()
        {
            $businessDetails=businessDetails::all();
            return view('frontend.list', compact('businessDetails'));
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        $businessDetails = businessDetails::where('user_id', $user_id)->get();
        return view('business', compact('businessDetails'));
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
            $value['user_id'] = $user_id;
            businessDetails::create($value);
        }

        return redirect("/account#business")->with('status', 'The post has been added!');
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
public function edit()
{
    $user_id = Auth::id();
    $businessDetails = businessDetails::where('user_id', $user_id)->get();
    return view('frontend.user.account.tabs.edit', compact('businessDetails'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = businessDetails::find($id);

        if (!$business) {
            return response()->json([
                'status' => 404,
                'message' => 'Business not found',
            ], 404);
        }

        $business->organisation_name = $request->input("inputs.$id.organisation_name");
        $business->organisation_address = $request->input("inputs.$id.organisation_address");
        // Update other fields here

        $business->save();

        return redirect('/memberList')->with('status', 'Data updated successfully');
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
    return redirect('/memberList')->with('status', 'Data updated successfully');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businessDetails  $businessDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(businessDetails $businessDetails,$id)
    {
        $businessDelete=businessDetails::find($id);
        $businessDelete->delete();
        return redirect('/memberList')->with('status', 'Data delete successfully');

    }

        public function destroyBusiness(businessDetails $businessDetails,$id)
    {
        // $businessDelete=businessDetails::find($id);
        $businessDelete->delete();
        return redirect('/memberList')->with('status', 'Data delete successfully');

    }
    
}
