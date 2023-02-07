<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\BloodSupply\StoreBloodSupply;
use App\Http\Requests\BloodSupply\UpdateBloodSupply;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\BloodSupply;
use App\Models\MasterData\BloodType;

// Third Party

class BloodSupplyController extends Controller
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
        abort_if(Gate::denies('blood_supply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada table
        $blood_supply = BloodSupply::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.blood-supply.index', compact('blood_supply', 'blood_type'));
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
    public function store(StoreBloodSupply $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['volume'] = str_replace(' Kantong', '', $data['volume']);

        // Kirim data ke database
        $blood_supply = BloodSupply::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.blood_supply.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.blood-supply.show', compact('blood_supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.blood-supply.edit', compact('blood_supply', 'blood_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodSupply $request, BloodSupply $blood_supply)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['volume'] = str_replace(' Kantong', '', $data['volume']);

        // Update data ke database
        $blood_supply->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.blood_supply.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodSupply $blood_supply)
    {
        abort_if(Gate::denies('blood_donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blood_supply->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Blood Supply');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
