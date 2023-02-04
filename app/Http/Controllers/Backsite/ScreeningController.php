<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Screening\StoreScreening;
use App\Http\Requests\Screening\UpdateScreening;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\MasterData\BloodType;
use App\Models\Operational\Screening;

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

        // Ditampilkan pada table
        $screening = Screening::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.screening.index', compact('screening', 'blood_type', 'officer'));
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

        // Kirim data ke database
        $screening = Screening::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Screening');
        // Tempat akan ditampilkannya Sweetalert
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

        return view('pages.backsite.operational.screening.edit', compact('screening', 'officer', 'blood_type'));
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
        alert()->success('Success Update Message', 'Successfully updated Screening');
        // Tempat akan ditampilkannya Sweetalert
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
        alert()->success('Success Delete Message', 'Successfully deleted Screening');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
