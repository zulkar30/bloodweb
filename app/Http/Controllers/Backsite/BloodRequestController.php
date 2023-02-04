<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodRequest\StoreBloodRequest;
use App\Http\Requests\BloodRequest\UpdateBloodRequest;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\Doctor;
use App\Models\Operational\Patient;
use App\Models\Operational\BloodRequest;
use App\Models\MasterData\BloodType;

// Third Party

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

        // Ditampilkan pada table
        $blood_request = BloodRequest::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        $doctor = Doctor::orderBy('name', 'asc')->get();
        $patient = Patient::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.blood-request.index', compact('blood_request', 'blood_type', 'officer', 'doctor', 'patient'));
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

        // Kirim data ke database
        $blood_request = BloodRequest::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Blood Request');
        // Tempat akan ditampilkannya Sweetalert
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
        abort_if(Gate::denies('blood_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
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
        alert()->success('Success Update Message', 'Successfully updated Blood Request');
        // Tempat akan ditampilkannya Sweetalert
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
        abort_if(Gate::denies('blood_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blood_request->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Blood Request');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
