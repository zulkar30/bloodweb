<?php

namespace App\Http\Controllers\Backsite;

// Default
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Request
use App\Http\Requests\Donor\StoreDonor;
use App\Http\Requests\Donor\UpdateDonor;

// Everything Else
use Auth;
use Gate;
use File;

// Model
use App\Models\User;
use App\Models\Operational\Donor;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\DonorType;
use App\Models\MasterData\Profession;

// Third Party

class DonorController extends Controller
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
        abort_if(Gate::denies('donor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donor = Donor::orderBy('created_at', 'desc')->get();
        $profession = Profession::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $donor_type = DonorType::orderBy('name', 'asc')->get();

        // Mendapatkan DonorID terakhir
        $lastDonor = Donor::orderBy('id', 'desc')->first();
        $lastDonorId = $lastDonor ? $lastDonor->id : 0;

        return view('pages.backsite.operational.donor.index', compact('donor', 'profession', 'blood_type', 'donor_type', 'lastDonorId'));
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
    public function store(StoreDonor $request)
    {
        // Upload process here
        $path = public_path('app/public/assets/file-donor');
        if (!File::isDirectory($path)) {
            $response = Storage::makeDirectory('public/assets/file-donor');
        }

        // Change file locations
        $photoPath = "";
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store(
                'assets/file-donor', 'public'
            );
        }

        // Prepare data for database insertion
        $blood_donor_data = [
            'no_reg' => $request->input('no_reg_hidden'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'nik' => $request->input('nik'),
            'address' => $request->input('address'),
            'contact' => $request->input('contact'),
            'age' => str_replace(' Tahun', '', $request->input('age')),
            'profession_id' => $request->input('profession_id'),
            'blood_type_id' => $request->input('blood_type_id'),
            'donor_type_id' => $request->input('donor_type_id'),
            'photo' => $photoPath,
            'status' => 'menunggu',
        ];

        // Insert data into the database
        $blood_donor = new Donor;
        $blood_donor->fill($blood_donor_data);
        $blood_donor->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menambahkan Data Pendonor Baru');
        return redirect()->route('backsite.donor.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        abort_if(Gate::denies('donor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.donor.show', compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        abort_if(Gate::denies('donor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Ditampilkan pada form sebagai pilihan
        $profession = Profession::orderBy('name', 'asc')->get();
        $blood_type = BloodType::orderBy('name', 'asc')->get();
        $donor_type = DonorType::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.donor.edit', compact('donor', 'profession', 'blood_type', 'donor_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonor $request, Donor $donor)
    {
        // Ambil semua data dari frontsite
        $data = $request->all();

        $data['age'] = str_replace(' Tahun', '', $data['age']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $donor['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-donor', 'public'
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
        $donor->update($data);

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Melakukan Perubahan Data');
        return redirect()->route('backsite.donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        abort_if(Gate::denies('donor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $donor['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $donor->delete();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menghapus Data');
        return back();
    }

    public function accept(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);
        $donor->status = 'diterima'; // Set the status to "Diterima"
        $donor->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menerima Pendaftaran Pendonor');
        return back();
    }

    public function reject(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);
        $donor->status = 'ditolak'; // Set the status to "Ditolak"
        $donor->save();

        // Sweetalert
        alert()->success('Berhasil', 'Berhasil Menolak Pendaftaran Pendonor');
        return back();
    }
}
