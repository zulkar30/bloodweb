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
    public function index()
    {
        $blood_type = BloodType::all();
        $donor_type = DonorType::all();
        $profession = Profession::all();

        $lastDonor = Donor::orderBy('id', 'desc')->first();
        $lastDonorId = $lastDonor ? $lastDonor->id : 0;

        return view('pages.frontsite.blood_donor', compact('blood_type', 'donor_type', 'profession', 'lastDonorId'));
    }

    public function store(Request $request)
    {
        // Upload process here
        $path = public_path('app/public/assets/file-donor');
        if (!File::isDirectory($path)) {
            $response = Storage::makeDirectory('public/assets/file-donor');
        }

        // Change file locations
        $photoPath = "";
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store(
                'assets/file-donor',
                'public'
            );
        }

        // Prepare data for database insertion
        $blood_donor_data = [
            'no_reg' => $request->input('no_reg'),
            'name' => $request->input('name'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'contact' => $request->input('contact'),
            'age' => str_replace(' Tahun', '', $request->input('age')),
            'blood_type_id' => $request->input('blood_type_id'),
            'donor_type_id' => $request->input('donor_type_id'),
            'profession_id' => $request->input('profession_id'),
            'photo' => $photoPath,
            'status' => 'menunggu',
        ];

        // Insert data into the database
        $blood_donor = new Donor;
        $blood_donor->fill($blood_donor_data);
        // dd($blood_donor);
        $blood_donor->save();

        alert()->success('Berhasil', 'Berhasil Melakukan Pendaftaran');
        return redirect()->route('blood_donor.success');
    }

    public function success(Request $request)
    {
        $blood_donor = Donor::latest()->first();
        return view('pages.frontsite.success.blood_donor_success', compact('blood_donor'));
    }
}
