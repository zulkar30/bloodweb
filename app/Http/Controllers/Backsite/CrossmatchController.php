<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Crossmatch\StoreCrossmatch;
use App\Http\Requests\Crossmatch\UpdateCrossmatch;

// Everything Else
use Auth;
use Gate;

// Model
use App\Models\Operational\Officer;
use App\Models\Operational\Crossmatch;
use App\Models\MasterData\BloodType;

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

        // Ditampilkan pada table
        $crossmatch = Crossmatch::orderBy('created_at', 'desc')->get();
        // Ditampilkan pada pilihan
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $officer = Officer::orderBy('name', 'asc')->get();
        
        return view('pages.backsite.operational.crossmatch.index', compact('crossmatch', 'blood_type', 'officer'));
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

        // Kirim data ke database
        $crossmatch = Crossmatch::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Crossmatch');
        // Tempat akan ditampilkannya Sweetalert
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

        return view('pages.backsite.operational.crossmatch.edit', compact('crossmatch', 'officer', 'blood_type'));
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

        // Update data ke database
        $crossmatch->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Crossmatch');
        // Tempat akan ditampilkannya Sweetalert
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
        alert()->success('Success Delete Message', 'Successfully deleted Crossmatch');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
