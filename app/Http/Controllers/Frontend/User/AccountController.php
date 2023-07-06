<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\businessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

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
        return view('frontend.user.account', compact('business_details'));
        // return view('frontend.user.account');
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
}




