<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Patient\StorePatient;
use App\Http\Requests\Patient\UpdatePatient;

// Everything Else
use Auth;
use Gate;
use File;

// Model
use App\Models\User;
use App\Models\Operational\Patient;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\MaintenanceSection;
use App\Models\MasterData\Room;

// Third Party

class PatientController extends Controller
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
        abort_if(Gate::denies('patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada tabel
        $patient = Patient::orderBy('created_at', 'desc')->get();
        $room = Room::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $maintenance_section = MaintenanceSection::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.patient.index', compact('patient', 'room', 'blood_type', 'maintenance_section'));
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
    public function store(StorePatient $request)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        $path = public_path('app/public/assets/file-patient');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-patient');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-patient', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        // Kirim data ke database
        $patient = Patient::create($data);

        // Sweetalert
        alert()->success('Success Create Message', 'Successfully added new Patient');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        abort_if(Gate::denies('patient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $room = Room::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $maintenance_section = MaintenanceSection::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.patient.edit', compact('patient', 'room', 'blood_type', 'maintenance_section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatient $request, Patient $patient)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $patient['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-patient', 'public'
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
        $patient->update($data);

        // Sweetalert
        alert()->success('Success Update Message', 'Successfully updated Patient');
        // Tempat akan ditampilkannya Sweetalert
        return redirect()->route('backsite.patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        abort_if(Gate::denies('patient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $patient['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $patient->delete();

        // Sweetalert
        alert()->success('Success Delete Message', 'Successfully deleted Patient');
        // Tempat akan ditampilkannya Sweetalert
        return back();
    }
}
