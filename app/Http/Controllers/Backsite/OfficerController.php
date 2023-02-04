<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Officer\StoreOfficer;
use App\Http\Requests\Officer\UpdateOfficer;
// Everything Else
use Auth;
use Gate;
use File;

// Model
use App\Models\User;
use App\Models\Operational\Officer;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\Position;

// Third Party

class OfficerController extends Controller
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
        abort_if(Gate::denies('officer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada tabel
        $officer = Officer::orderBy('created_at', 'desc')->get();
        $position = Position::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        // Ditampilkan pada form sebagai pilihan
        $user = User::whereHas('detail_user', function($query){
            $query->where('type_user_id', 2);
        })->orderBy('name', 'asc')->get();
        return view('pages.backsite.operational.officer.index', compact('officer', 'position', 'blood_type', 'user'));
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
    public function store(StoreOfficer $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        $path = public_path('app/public/assets/file-officer');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-officer');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-officer', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        // Kirim data ke database
        $officer = Officer::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Officer');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.officer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        abort_if(Gate::denies('officer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.officer.show', compact('officer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        abort_if(Gate::denies('officer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $position = Position::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $user = User::whereHas('detail_user', function($query){
            $query->where('type_user_id', 2);
        })->orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.officer.edit', compact('officer', 'position', 'blood_type', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficer $request, Officer $officer)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $officer['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-officer', 'public'
            );

            // delete old photo from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // Update data ke database
        $officer->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Officer');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.officer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        abort_if(Gate::denies('officer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $officer['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $officer->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Officer');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
