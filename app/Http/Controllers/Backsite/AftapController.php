<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Aftap\StoreAftap;
use App\Http\Requests\Aftap\UpdateAftap;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\Donor;
use App\Models\MasterData\PouchType;
use App\Models\Operational\Aftap;
use App\Models\MasterData\BloodType;

// Third Party

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

        // Ditampilkan pada table
        $aftap = Aftap::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        $donor = Donor::orderBy('name', 'asc')->get();
        $pouch_type = PouchType::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.aftap.index', compact('aftap', 'blood_type', 'officer', 'donor', 'pouch_type'));
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
        $data = $request->all();

        // Kirim data ke database
        $aftap = Aftap::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Aftap');
        // Tempat akan ditampilkannya Sweetalert
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
        abort_if(Gate::denies('aftap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $officer = Officer::orderBy('name', 'asc')->get();
        $donor = Donor::orderBy('name', 'asc')->get();
        $pouch_type = PouchType::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.aftap.edit', compact('aftap', 'officer', 'blood_type', 'donor', 'pouch_type'));
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

        // Update data ke database
        $aftap->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Aftap');
        // Tempat akan ditampilkannya Sweetalert
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
        abort_if(Gate::denies('aftap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aftap->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Aftap');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
