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
use Illuminate\Support\Facades\Storage;



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


        public function deleteFamily(Request $request, $id)
        {
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

        public function updateFamaily(Request $request)
        {
            $userIds = $request->input('user_id');
            $inputs = $request->input('inputs');
            foreach ($userIds as $index => $userId) {
                $family = family_details::find($userId);
                $family->name = $inputs[$index]['name'];
                $family->phone = $inputs[$index]['phone'];
                $family->email = $inputs[$index]['email'];
                $family->relation = $inputs[$index]['relation'];
                $family->DOB = $inputs[$index]['DOB'];
                $family->married = $inputs[$index]['married'];
                $family->gender = $inputs[$index]['gender'];
                $family->origin_city = $inputs[$index]['origin_city'];
                $family->blood_group = $inputs[$index]['blood_group'];

                // Handle file upload for each family member
                if ($request->hasFile("inputs.{$index}.photo")) {
                    $photo = $request->file("inputs.{$index}.photo");
                    $photoPath = $photo->store('photos'); // Customize the storage path as per your requirements
                    $family->photo = $photoPath;
                }

                $family->update();
            }

            return redirect('/account#family')->with('status', 'Family details updated successfully.');
        }


        public function updateUser(Request $request,$id)
        {
            $userId = $request->input('user_id');
            $user = user_detai::find($id);
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

        public function updateBusiness(Request $request)
        {
            $userIds = $request->input('user_id');
            $inputs = $request->input('inputs');
            foreach ($userIds as $index => $userId) {
                $business = businessDetails::find($userId);
                $business->organisation_name = $inputs[$index]['organisation_name'];
                $business->organisation_address = $inputs[$index]['organisation_address'];
                $business->organisation_state = $inputs[$index]['organisation_state'];
                $business->organisation_city = $inputs[$index]['organisation_city'];
                $business->organisation_country = $inputs[$index]['organisation_country'];
                $business->organisation_phone = $inputs[$index]['organisation_phone'];
                $business->organisation_email = $inputs[$index]['organisation_email'];
                $business->organisation_photos = $inputs[$index]['organisation_photos'];
                $business->update();
            }

            return redirect('/account#business')->with('status', 'Business details updated successfully.');
        }

        public function deleteBusiness(Request $request, $id)
        {
            try {
                businessDetails::where('id', $id)->delete();
                return response()->json(['message' => 'Business member deleted successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to delete Business member'], 500);
            }
        }



}
