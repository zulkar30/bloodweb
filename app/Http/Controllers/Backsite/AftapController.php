<?php
namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;

// Library
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Aftap\StoreAftap;
use App\Http\Requests\Aftap\UpdateAftap;

// Everything Else
use Gate;

// Model
use App\Models\Operational\Donor;
use App\Models\Operational\Officer;
use App\Models\Operational\Aftap;
use App\Models\MasterData\PouchType;
use App\Models\Operational\Patient;

class AftapController extends Controller
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
        abort_if(Gate::denies('aftap_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $aftap = Aftap::orderBy('created_at', 'desc')->get();
        $donor = Donor::orderBy('id', 'desc')->get();
        $patient = Patient::orderBy('id', 'desc')->get();
        $pouch_type = PouchType::orderBy('id', 'asc')->get();

        // Mendapatkan AftapID terakhir
        $lastAftap = Aftap::orderBy('id', 'desc')->first();
        $lastAftapId = $lastAftap ? $lastAftap->id : 0;

        // Mendapatkan data officer yang login sebagai officer
        $loggedInUser = Auth::user();
        $officerForLoggedInUser = $loggedInUser->officer;

        // Mendapatkan OfficerID
        $officerOptions = Officer::pluck('name', 'id');
        
        return view('pages.backsite.operational.aftap.index', compact('aftap', 'donor', 'officerForLoggedInUser', 'officerOptions', 'patient', 'pouch_type', 'lastAftapId'));
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
    public function store(StoreAftap $request)
    {
        // Ambil semua data dari frontsite
        $aftap = new Aftap;
        $aftap->no_labu = $request->input('no_labu');
        $aftap->volume = $request->input('volume');
        $aftap->patient_id = $request->input('patient_id_hidden');
        $aftap->donor_id = $request->input('donor_id_hidden');
        $aftap->pouch_type_id = $request->input('pouch_type_id');
        $aftap->officer_id = $request->input('officer_id');
        $aftap->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Aftap Baru');
        return redirect()->route('backsite.aftap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aftap $aftap)
    {
        // Middleware Gate
        abort_if(Gate::denies('aftap_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.aftap.show', compact('aftap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aftap $aftap)
    {
        // Middleware Gate
        abort_if(Gate::denies('aftap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Model
        $donor = Donor::orderBy('no_reg', 'desc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        $patient = Patient::orderBy('no_mr', 'desc')->get();
        $pouch_type = PouchType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.aftap.edit', compact('aftap', 'donor', 'officer', 'patient', 'pouch_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAftap $request, Aftap $aftap)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        // Menghilangkan string pada input number
        $data['volume'] = str_replace(' Kantong', '', $data['volume']);

        // Update data ke database
        $aftap->update($data);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Mengubah Data Aftap');
        return redirect()->route('backsite.aftap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aftap $aftap)
    {
        // Middleware Gate
        abort_if(Gate::denies('aftap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Menghapus data
        $aftap->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data Aftap');
        return back();
    }
}
