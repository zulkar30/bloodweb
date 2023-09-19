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

        $lastBloodRequest = BloodRequest::orderBy('id', 'desc')->first();
        $lastBloodRequestId = $lastBloodRequest ? $lastBloodRequest->id : 0;

        return view('pages.frontsite.blood_request', compact('blood_type', 'patient', 'doctor', 'officer', 'lastBloodRequestId'));
    }

    public function store(Request $request)
    {
        // Mengambil data dari frontsite
        $blood_request_data = [
            'no_br' => $request->input('no_br') ?? null,
            'name' => $request->input('name') ?? null,
            'address' => $request->input('address') ?? null,
            'contact' => $request->input('contact') ?? null,
            'gender' => $request->input('gender') ?? null,
            'age' => str_replace(' Tahun', '', $request->input('age')) ?? null,
            'wb' => $request->input('wb') ?? null,
            'we' => $request->input('we') ?? null,
            'prc' => $request->input('prc') ?? null,
            'tc' => $request->input('tc') ?? null,
            'ffp' => $request->input('ffp') ?? null,
            'cry' => $request->input('cry') ?? null,
            'plasma' => $request->input('plasma') ?? null,
            'prp' => $request->input('prp') ?? null,
            'total' => str_replace(' Komponen', '', $request->input('total')) ?? null,
            'info' => $request->input('info') ?? null,
            'fulfilled' => $request->input('fulfilled') ?? null,
            'doctor_id' => $request->input('doctor_id') ?? null,
            'officer_id' => $request->input('officer_id') ?? null,
            'patient_id' => $request->input('patient_id') ?? null,
            'blood_type_id' => $request->input('blood_type_id') ?? null,
            'status' => 'menunggu',
        ];

        // Mengirim data ke database
        $blood_request = new BloodRequest();
        $blood_request->fill($blood_request_data);
        $blood_request->save();

        alert()->success('Berhasil', 'Berhasil Melakukan Pendaftaran');
        return redirect()->route('blood_request.success');
    }

    public function success(){
        $blood_request = BloodRequest::latest()->first();
        return view('pages.frontsite.success.blood_request_success', compact('blood_request'));
    }
}
