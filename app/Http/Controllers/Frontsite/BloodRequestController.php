<?php

namespace App\Http\Controllers\Frontsite;

use Illuminate\Http\Request;
use App\Models\Operational\Doctor;
use App\Models\Operational\Officer;
use App\Models\Operational\Patient;
use App\Http\Controllers\Controller;
use App\Models\MasterData\BloodType;
use App\Models\Operational\BloodRequest;
use Illuminate\Support\Facades\Storage;
use File;

class BloodRequestController extends Controller
{
    public function index(){
        $blood_type = BloodType::all();
        $patient = Patient::all();
        $doctor = Doctor::all();
        $officer = Officer::all();

        return view('pages.frontsite.blood_request', compact('blood_type', 'patient', 'doctor', 'officer'));
    }

    public function store(Request $request){
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['total'] = str_replace(' Komponen', '', $data['total']);

        // upload process here
        $path = public_path('app/public/assets/file-donor');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-donor');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-blood_request', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        $blood_request = new BloodRequest();
        $blood_request->wb = $data['wb'];
        $blood_request->we = $data['we'];
        $blood_request->prc = $data['prc'];
        $blood_request->tc = $data['tc'];
        $blood_request->ffp = $data['ffp'];
        $blood_request->cry = $data['cry'];
        $blood_request->plasma = $data['plasma'];
        $blood_request->prp = $data['prp'];
        $blood_request->total = $data['total'];
        $blood_request->info = $data['info'];
        $blood_request->status = 2;

        if (isset($data['doctor_id'])) {
            $blood_request->doctor_id = $data['doctor_id'];
        }
        if (isset($data['patient_id'])) {
            $blood_request->patient_id = $data['patient_id'];
        }
        if (isset($data['officer_id'])) {
            $blood_request->officer_id = $data['officer_id'];
        }
        if (isset($data['blood_type_id'])) {
            $blood_request->blood_type_id = $data['blood_type_id'];
        }
        if (isset($data['name'])) {
            $blood_request->name = $data['name'];
        }
        if (isset($data['address'])) {
            $blood_request->address = $data['address'];
        }
        if (isset($data['contact'])) {
            $blood_request->contact = $data['contact'];
        }
        if (isset($data['gender'])) {
            $blood_request->gender = $data['gender'];
        }
        if (isset($data['age'])) {
            $data['age'] = str_replace(' Tahun', '', $data['age']);
            $blood_request->age = $data['age'];
        }

        // dd($blood_request);

        $blood_request->save();


        // Sweetalert
        alert()->success('Success Create Message', 'Successfully Register for Blood Request');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('blood_request.success');
    }

    public function success(){
        return view('pages.frontsite.success.blood_request_success');
    }
}
