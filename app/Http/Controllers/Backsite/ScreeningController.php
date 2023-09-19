<?php

namespace App\Http\Controllers\Backsite;

// Default
use Gate;

// Library
use App\Models\Operational\Aftap;

// Request
use App\Models\Operational\Officer;
use App\Http\Controllers\Controller;

// Everything Else
use App\Models\MasterData\BloodType;
use Illuminate\Support\Facades\Auth;

// Model
use App\Models\Operational\Screening;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Screening\StoreScreening;
use App\Http\Requests\Screening\UpdateScreening;

// Third Party

class ScreeningController extends Controller
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
        abort_if(Gate::denies('screening_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $aftap = Aftap::orderBy('id','desc')->get();
        $screening = Screening::orderBy('created_at', 'desc')->get();

        // Mendapatkan ScreeningID terakhir
        $lastScreening = Screening::orderBy('id', 'desc')->first();
        $lastScreeningId = $lastScreening ? $lastScreening->id : 0;

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');
        
        return view('pages.backsite.operational.screening.index', compact('screening', 'lastScreeningId', 'blood_type', 'officerForLoggedInUser', 'officerOptions', 'aftap'));
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
    public function store(StoreScreening $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $screening = new Screening();
        $screening->no_sc = $data['no_sc'];
        $screening->hiv = $data['hiv'] ?? null;
        $screening->hcv = $data['hcv'] ?? null;
        $screening->hbsag = $data['hbsag'] ?? null;
        $screening->vdrl = $data['vdrl'] ?? null;
        $screening->result = $data['result'] ?? null;
        $screening->officer_id = $data['officer_id'];
        $screening->aftap_id = $data['aftap_id'];
        $screening->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Skrinning Baru');
        return redirect()->route('backsite.screening.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Screening $screening)
    {
        abort_if(Gate::denies('screening_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.screening.show', compact('screening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Screening $screening)
    {
        abort_if(Gate::denies('screening_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $officer = Officer::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $aftap = Aftap::orderBy('id','desc')->get();

        return view('pages.backsite.operational.screening.edit', compact('screening', 'officer', 'blood_type', 'aftap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScreening $request, Screening $screening)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Update data ke database
        $screening->update($data);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Melakukan Perubahan Data Skrinning');
        return redirect()->route('backsite.screening.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screening $screening)
    {
        abort_if(Gate::denies('screening_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $screening->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data Skrinning');
        return back();
    }
}
