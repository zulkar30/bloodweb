<?php

namespace App\Http\Controllers\Backsite;

// Default
use Gate;

// Library
use App\Models\Operational\Officer;

// Request
use App\Http\Controllers\Controller;
use App\Models\MasterData\BloodType;

// Everything Else
use Illuminate\Support\Facades\Auth;
use App\Models\Operational\Screening;

// Model
use App\Models\Operational\Crossmatch;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Crossmatch\StoreCrossmatch;
use App\Http\Requests\Crossmatch\UpdateCrossmatch;

// Third Party

class CrossmatchController extends Controller
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
        abort_if(Gate::denies('crossmatch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $crossmatch = Crossmatch::orderBy('created_at', 'desc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();

        // Menampilkan data skrinning yang hanya result nya non-reaktif
        $screening = Screening::where('result', 'non-reaktif')->orderBy('id', 'desc')->get();

        // Mendapatkan CrossmatchID terakhir
        $lastCrossmatch = Crossmatch::orderBy('id', 'desc')->first();
        $lastCrossmatchId = $lastCrossmatch ? $lastCrossmatch->id : 0;

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');
        
        return view('pages.backsite.operational.crossmatch.index', compact('crossmatch', 'blood_type', 'officerForLoggedInUser', 'officerOptions', 'screening' , 'lastCrossmatchId'));
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
    public function store(StoreCrossmatch $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $crossmatch = new Crossmatch();
        $crossmatch->no_cm = $data['no_cm'];
        $crossmatch->fase1 = $data['fase1'] ?? null;
        $crossmatch->fase2 = $data['fase2'] ?? null;
        $crossmatch->fase3 = $data['fase3'] ?? null;
        $crossmatch->result = $data['result'] ?? null;
        $crossmatch->officer_id = $data['officer_id'] ?? null;
        $crossmatch->screening_id = $data['screening_id'] ?? null;
        $crossmatch->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Crossmatch Baru');
        return redirect()->route('backsite.crossmatch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crossmatch $crossmatch)
    {
        abort_if(Gate::denies('crossmatch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.crossmatch.show', compact('crossmatch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crossmatch $crossmatch)
    {
        abort_if(Gate::denies('crossmatch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $officer = Officer::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        
        // Menampilkan data skrinning yang hanya result nya non-reaktif
        $screening = Screening::where('result', 'non-reaktif')->orderBy('id', 'desc')->get();

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');

        return view('pages.backsite.operational.crossmatch.edit', compact('crossmatch', 'officerForLoggedInUser', 'officerOptions', 'blood_type', 'screening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCrossmatch $request, Crossmatch $crossmatch)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $crossmatch->no_cm = $data['no_cm'];
        $crossmatch->fase1 = $data['fase1'] ?? null;
        $crossmatch->fase2 = $data['fase2'] ?? null;
        $crossmatch->fase3 = $data['fase3'] ?? null;
        $crossmatch->result = $data['result'] ?? null;
        $crossmatch->officer_id = $data['officer_id'] ?? null;
        $crossmatch->screening_id = $data['screening_id'] ?? null;
        // dd($crossmatch);
        $crossmatch->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Melakukan Perubahan Data Crossmatch');
        return redirect()->route('backsite.crossmatch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crossmatch $crossmatch)
    {
        abort_if(Gate::denies('crossmatch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crossmatch->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data Crossmatch');
        return back();
    }
}
