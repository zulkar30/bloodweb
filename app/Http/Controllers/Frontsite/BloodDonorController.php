<?php

namespace App\Http\Controllers\Frontsite;

use File;
use Illuminate\Http\Request;
use App\Models\Operational\Donor;
use App\Http\Controllers\Controller;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\DonorType;
use App\Models\MasterData\Profession;
use Illuminate\Support\Facades\Storage;
use PDF;


class BloodDonorController extends Controller
{
    public function index(){
        $blood_type = BloodType::all();
        $donor_type = DonorType::all();
        $profession = Profession::all();

        return view('pages.frontsite.blood_donor', compact('blood_type', 'donor_type', 'profession'));
    }

    public function store(Request $request){
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        $path = public_path('app/public/assets/file-donor');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-donor');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-donor', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        $blood_donor = new Donor;
        $blood_donor->name = $data['name'];
        $blood_donor->birth_place = $data['birth_place'];
        $blood_donor->birth_date = $data['birth_date'];
        $blood_donor->gender = $data['gender'];
        $blood_donor->contact = $data['contact'];
        $blood_donor->address = $data['address'];
        $blood_donor->age = $data['age'];
        $blood_donor->photo = $data['photo'];
        $blood_donor->profession_id = $data['profession_id'];
        $blood_donor->blood_type_id = $data['blood_type_id'];
        $blood_donor->donor_type_id = $data['donor_type_id'];
        $blood_donor->status = 2;
        $blood_donor->save();

        return redirect()->route('blood_donor.success');
    }

    public function success(Request $request){
        $blood_donor = Donor::latest()->first();
        return view('pages.frontsite.success.blood_donor_success', compact('blood_donor'));
    }
}
