<?php

namespace App\Http\Controllers\Frontsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterData\BloodType;
use App\Models\Operational\BloodSupply;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

        $blood_supply = BloodSupply::with('blood_type')->get();
        $blood_type = BloodType::all();

        return view('pages.frontsite.home', compact('blood_supply', 'blood_type'));
    }
}
