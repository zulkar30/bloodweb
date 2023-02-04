<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodDonor\StoreBloodDonor;
use App\Http\Requests\BloodDonor\UpdateBloodDonor;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\BloodDonor;
use App\Models\MasterData\BloodType;

// Third Party

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

        // Ditampilkan pada table
        $blood_donor = BloodDonor::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.blood-donor.index', compact('blood_donor', 'blood_type', 'officer'));
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

        // Kirim data ke database
        $blood_donor = BloodDonor::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Blood Donor');
        // Tempat akan ditampilkannya Sweetalert
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
        abort_if(Gate::denies('blood_donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $officer = Officer::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.blood-donor.edit', compact('blood_donor', 'officer', 'blood_type'));
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
        alert()->success('Success Update Message', 'Successfully updated Blood Donor');
        // Tempat akan ditampilkannya Sweetalert
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
        alert()->success('Success Delete Message', 'Successfully deleted Blood Donor');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
