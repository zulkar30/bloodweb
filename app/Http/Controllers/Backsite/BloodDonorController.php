<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;

// Library
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodDonor\StoreBloodDonor;
use App\Http\Requests\BloodDonor\UpdateBloodDonor;

// Everything Else
use Illuminate\Support\Facades\Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\BloodDonor;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\DonorType;
use App\Models\MasterData\PouchType;
use App\Models\Operational\BloodRequest;
use App\Models\Operational\Donor;

class BloodDonorController extends Controller
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
        abort_if(Gate::denies('blood_donor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $blood_donor = BloodDonor::orderBy('created_at', 'desc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $pouch_type = PouchType::orderBy('name', 'asc')->get();
        $donor_type = DonorType::orderBy('name', 'asc')->get();
        $donor = Donor::orderBy('name', 'asc')->get();
        $blood_request = BloodRequest::orderBy('id', 'desc')->get();

        // Mendapatkan BloodDonorID terakhir
        $lastBloodDonor = BloodDonor::orderBy('id', 'desc')->first();
        $lastBloodDonorId = $lastBloodDonor ? $lastBloodDonor->id : 0;

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');
        
        return view('pages.backsite.operational.blood-donor.index', compact('blood_donor', 'blood_type', 'officerForLoggedInUser', 'officerOptions', 'pouch_type', 'donor_type', 'donor', 'blood_request', 'lastBloodDonorId'));
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
    public function store(StoreBloodDonor $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $blood_donor = new BloodDonor();
        $blood_donor->no_bd= $data['no_bd'];
        $blood_donor->name= $data['name'];
        $blood_donor->hb= $data['hb'];
        $blood_donor->t_meter= $data['t_meter'];
        $blood_donor->bb= $data['bb'];
        $blood_donor->result= 2;
        $blood_donor->officer_id= $data['officer_id'];
        $blood_donor->blood_request_id= $data['blood_request_id'];
        $blood_donor->blood_type_id= $data['blood_type_id'];
        $blood_donor->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Donor Darah Baru');
        return redirect()->route('backsite.blood_donor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDonor $blood_donor)
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.blood-donor.show', compact('blood_donor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonor $blood_donor)
    {
        // Middleware Gate
        abort_if(Gate::denies('blood_donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $officer = Officer::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $pouch_type = PouchType::orderBy('name', 'asc')->get();
        $donor_type = DonorType::orderBy('name', 'asc')->get();
        $donor = Donor::orderBy('name', 'asc')->get();
        $blood_request = BloodRequest::orderBy('id', 'desc')->get();

        return view('pages.backsite.operational.blood-donor.edit', compact('blood_donor', 'officer', 'blood_type', 'pouch_type', 'donor_type', 'donor', 'blood_request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodDonor $request, BloodDonor $blood_donor)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Update data ke database
        $blood_donor->update($data);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Mengubah Data Donor Darah');
        return redirect()->route('backsite.blood_donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonor $blood_donor)
    {
        abort_if(Gate::denies('blood_donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blood_donor->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data Donor Darah');
        return back();
    }
}
