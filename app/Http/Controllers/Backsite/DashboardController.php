<?php

namespace App\Http\Controllers\Backsite;

// Default
use Auth;
use App\Models\User;

// Library
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterData\BloodType;
use App\Models\MasterData\DonorType;
use App\Models\MasterData\MaintenanceSection;
use App\Models\MasterData\Permission;
use App\Models\MasterData\Position;
use App\Models\MasterData\PouchType;
use App\Models\MasterData\Profession;
use App\Models\MasterData\Role;
use App\Models\MasterData\Room;
use App\Models\MasterData\TypeUser;
use App\Models\Operational\Aftap;
use App\Models\Operational\BloodDonor;
use App\Models\Operational\BloodRequest;
use App\Models\Operational\BloodSupply;
use App\Models\Operational\Crossmatch;
use App\Models\Operational\Doctor;
use App\Models\Operational\Donor;
use App\Models\Operational\Officer;
use App\Models\Operational\Patient;
use App\Models\Operational\Screening;
// Request

// Everything Else
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Model

// Third Party

class DashboardController extends Controller
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
        $users = User::count();
        $blood_types = BloodType::count();
        $donor_types = DonorType::count();
        $maintenance_sections = MaintenanceSection::count();
        $permissions = Permission::count();
        $positions = Position::count();
        $pouch_types = PouchType::count();
        $professions = Profession::count();
        $roles = Role::count();
        $rooms = Room::count();
        $type_users = TypeUser::count();
        $aftaps = Aftap::count();
        $blood_donors = BloodDonor::count();
        $blood_requests = BloodRequest::count();
        $blood_supplies = BloodSupply::count();
        $crossmatches = Crossmatch::count();
        $doctors = Doctor::count();
        $donors = Donor::count();
        $officers = Officer::count();
        $patients = Patient::count();
        $screenings = Screening::count();
        return view('pages.backsite.dashboard.index', compact('users', 'blood_types', 'donor_types', 'maintenance_sections', 'permissions', 'positions', 'pouch_types', 'professions', 'roles', 'rooms', 'type_users', 'aftaps', 'blood_donors', 'blood_requests', 'blood_supplies', 'crossmatches', 'doctors', 'donors', 'officers', 'patients', 'screenings'));
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
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
