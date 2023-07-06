<?php

namespace App\Http\Controllers;

use App\Models\BusinessDetails;
use App\Models\FamilyDetails;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CombinedDataController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $businessDetails = BusinessDetails::where('user_id', $user_id)->get();
        $familyDetails = FamilyDetails::where('user_id', $user_id)->get();
        $userDetails = UserDetails::where('user_id', $user_id)->get();

        return view('combined', compact('businessDetails', 'familyDetails', 'userDetails'));
    }
}

