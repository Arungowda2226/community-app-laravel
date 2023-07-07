<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\businessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\family_details;
use App\Models\user_detai;



/**
 * Class AccountController.
 */
class AccountController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
        public function index()
        {
            $user_id = Auth::id();
            $business_details = businessDetails::where('user_id', $user_id)->get();
            $family_details = family_details::where('user_id', $user_id)->get();
            $user_details = user_detai::where('user_id', $user_id)->get();

            return view('frontend.user.account', compact('business_details', 'family_details','user_details'));
        }

        public function deleteFamily(Request $request,$id)
        {
            $formId = $request->input('formId');
            try {
                family_details::where('id', $id)->delete();
                return response()->json(['message' => 'Family member deleted successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to delete family member'], 500);
            }
        }



    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.organisation_name' => 'required',
            'inputs.*.organisation_address' => 'required',
            
        ]);

        $user_id = Auth::id();
        foreach ($request->inputs as $key => $value) {
            $value['user_id'] = $user_id;
            businessDetails::create($value);
        }
        return redirect("/account#business")->with('status', 'The post has been added!');
    }

public function updateFam(Request $request)
{
    $inputs = $request->input('inputs');
    
    foreach ($inputs as $input) {
        $formId = $input['form_id'];
        $family = family_details::find($formId);
        
        if ($family) { // Fix: Replace $business with $family
            $family->name = $input['name'];
            $family->phone = $input['phone'];
            $family->email = $input['email'];
            $family->relation = $input['relation'];
            $family->photo = $input['photo'];
            $family->DOB = $input['DOB'];
            $family->married = $input['married'];
            $family->gender = $input['gender'];
            $family->origin_city = $input['origin_city'];
            $family->blood_group = $input['blood_group'];
            
            $family->update(); // Fix: Use $family instead of $business
        }
    }
    
    return redirect('/account#family')->with('status', 'Family details updated successfully.');
}

public function updateUser(Request $request,$id)
{
    $userId = $request->input('user_id');
    echo "{{ $userId}}";
    $user = user_detai::find($id);
    echo "{{ $user}}";
    $inputs = $request->input('inputs')[0];
    $user->name = $inputs['name'];
    $user->father_name = $inputs['father_name'];
    $user->mother_name = $inputs['mother_name'];
    $user->mother_name = $inputs['photo'];
    $user->mother_name = $inputs['phone'];
    $user->mother_name = $inputs['email'];
    $user->mother_name = $inputs['DOB'];
    $user->mother_name = $inputs['gender'];
    $user->mother_name = $inputs['married'];
    $user->mother_name = $inputs['blood_group'];
    $user->mother_name = $inputs['address'];
    $user->mother_name = $inputs['state'];
    $user->mother_name = $inputs['city'];
    $user->mother_name = $inputs['pincode'];
    $user->mother_name = $inputs['country'];
    $user->mother_name = $inputs['origin_address'];
    $user->mother_name = $inputs['origin_state'];
    $user->mother_name = $inputs['origin_city'];
    $user->mother_name = $inputs['origin_pincode'];

    $user->update();
    return redirect('/account#user')->with('status', 'User details updated successfully.');
}



}
