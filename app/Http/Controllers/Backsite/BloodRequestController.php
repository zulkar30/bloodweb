<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodRequest\StoreBloodRequest;
use App\Http\Requests\BloodRequest\UpdateBloodRequest;

// Everything Else
use Illuminate\Support\Facades\Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\Doctor;
use App\Models\Operational\Patient;
use App\Models\Operational\BloodRequest;
use App\Models\MasterData\BloodType;

class BloodRequestController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $blood_request = BloodRequest::orderBy('created_at', 'desc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $doctor = Doctor::orderBy('name', 'asc')->get();
        $patient = Patient::orderBy('id', 'desc')->get();

        // Mendapatkan BloodRequestID terakhir
        $lastBloodRequest = BloodRequest::orderBy('id', 'desc')->first();
        $lastBloodRequestId = $lastBloodRequest ? $lastBloodRequest->id : 0;

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');
        
        return view('pages.backsite.operational.blood-request.index', compact('blood_request', 'blood_type', 'officerForLoggedInUser', 'officerOptions', 'lastBloodRequestId', 'doctor', 'patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodRequest $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['total'] = str_replace(' Unit', '', $data['total']);

        $blood_request = new BloodRequest();
        $blood_request->no_br = $data['no_br_hidden'];
        $blood_request->name = $data['name'] ?? null;
        $blood_request->address = $data['address'] ?? null;
        $blood_request->contact = $data['contact'] ?? null;
        $blood_request->gender = $data['gender'] ?? null;
        $blood_request->age = $data['age'] ?? null;
        $blood_request->wb = $data['wb'];
        $blood_request->we = $data['we'];
        $blood_request->prc = $data['prc'];
        $blood_request->tc = $data['tc'];
        $blood_request->ffp = $data['ffp'];
        $blood_request->cry = $data['cry'];
        $blood_request->plasma = $data['plasma'];
        $blood_request->prp = $data['prp'];
        $blood_request->total = $data['total'];
        $blood_request->info = $data['info'] ?? null;
        $blood_request->fulfilled = $data['fulfilled'] ?? null;
        $blood_request->doctor_id = $data['doctor_id'];
        $blood_request->officer_id = $data['officer_id'];
        $blood_request->patient_id = $data['patient_id_hidden'];
        $blood_request->blood_type_id = $data['blood_type_id'] ?? null;
        $blood_request->status =  2;
        $blood_request->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Permintaan Darah Baru');
        return redirect()->route('backsite.blood_request.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodRequest $blood_request)
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.blood-request.show', compact('blood_request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodRequest $blood_request)
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $officer = Officer::orderBy('name', 'asc')->get();
        $doctor = Doctor::orderBy('name', 'asc')->get();
        $patient = Patient::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.blood-request.edit', compact('blood_request', 'officer', 'doctor', 'patient', 'blood_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodRequest $request, BloodRequest $blood_request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Update data ke database
        $blood_request->update($data);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Mengubah Data Permintaan Darah');
        return redirect()->route('backsite.blood_request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodRequest $blood_request)
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Fungsi hapus
        $blood_request->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data Permintaan Darah');
        return back();
    }

    public function accept(Request $request, $id)
    {
        // Mencari data berdasarkan id yang dipilih atau diklik
        $blood_request = BloodRequest::findOrFail($id);
        $blood_request->status = 1; // Set status menjadi "Diterima"
        $blood_request->fulfilled = $request->input('fulfilled'); // Ambil nilai fulfilled dari input form
        $blood_request->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menerima Permintaan Darah');
        return back();
    }

    public function reject($id)
    {
        // Mencari data berdasarkan id yang dipilih atau diklik
        $blood_request = BloodRequest::findOrFail($id);
        $blood_request->status = 3; // Set status menjadi "Ditolak"
        $blood_request->fulfilled = 0; // Set nilai fulfilled menjadi 0
        $blood_request->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menolak Permintaan Darah');
        return back();
    }
}
