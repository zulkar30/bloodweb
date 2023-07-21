@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Activity</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @can('dashboard_super_admin_access')
                    {{-- ManagemenetAccess --}}
                    <div class="col-12 management-access">
                        <h3 class="content-header-title mb-0 d-inline-block">ManagementAccess</h3>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('backsite.user.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">User</h1>
                                        <i class='bx bx-user icon'></i>
                                        <span class="count-numbers">{{ $users }}</span>
                                        <span class="count-name">{{ ' Users' }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                @can('dashboard_admin_access')
                    {{-- MasterData --}}
                    <div class="col-12 master-data">
                        <h3 class="content-header-title mb-0 d-inline-block">MasterData</h3>
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-3">
                                <a href="{{ route('backsite.blood_type.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Blood Type</h1>
                                        <i class='bx bx-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $blood_types }}</span>
                                        <span class="count-name">{{ ' Blood Types' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.donor_type.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Donor Type</h1>
                                        <i class='bx bxs-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $donor_types }}</span>
                                        <span class="count-name">{{ ' Donor Types' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.maintenance_section.index') }}">
                                    <div class="card-counter success">
                                        <h1 class="card-title">Maintenance Section</h1>
                                        <i class='bx bx-plus-medical icon'></i>
                                        <span class="count-numbers">{{ $maintenance_sections }}</span>
                                        <span class="count-name">{{ ' Maintenance Sections' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.permission.index') }}">
                                    <div class="card-counter info">
                                        <h1 class="card-title">Permission</h1>
                                        <i class='bx bxs-key icon'></i>
                                        <span class="count-numbers">{{ $permissions }}</span>
                                        <span class="count-name">{{ ' Permission' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.position.index') }}">
                                    <div class="card-counter info">
                                        <h1 class="card-title">Position</h1>
                                        <i class='bx bxs-user-detail icon'></i>
                                        <span class="count-numbers">{{ $positions }}</span>
                                        <span class="count-name">{{ ' Positions' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.pouch_type.index') }}">
                                    <div class="card-counter success">
                                        <h1 class="card-title">Pouch Type</h1>
                                        <i class='bx bxl-pocket icon'></i>
                                        <span class="count-numbers">{{ $pouch_types }}</span>
                                        <span class="count-name">{{ ' Pouch Types' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.user.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Profession</h1>
                                        <i class='bx bxs-user-badge icon'></i>
                                        <span class="count-numbers">{{ $professions }}</span>
                                        <span class="count-name">{{ ' Professions' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.role.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Role</h1>
                                        <i class='bx bxs-user-check icon'></i>
                                        <span class="count-numbers">{{ $roles }}</span>
                                        <span class="count-name">{{ ' Roles' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.room.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Room</h1>
                                        <i class='bx bx-building-house icon'></i>
                                        <span class="count-numbers">{{ $rooms }}</span>
                                        <span class="count-name">{{ ' Rooms' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.type_user.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Type User</h1>
                                        <i class='bx bx-user-pin icon'></i>
                                        <span class="count-numbers">{{ $type_users }}</span>
                                        <span class="count-name">{{ ' Type Users' }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Operational --}}
                    <div class="col-12 operational">
                        <h3 class="content-header-title mb-0 d-inline-block">Operational</h3>
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-3">
                                <a href="{{ route('backsite.aftap.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Aftap</h1>
                                        <i class='bx bx-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $aftaps }}</span>
                                        <span class="count-name">{{ ' Aftaps' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.blood_donor.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Blood Donor</h1>
                                        <i class='bx bx-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $blood_donors }}</span>
                                        <span class="count-name">{{ ' Blood Donors' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.blood_request.index') }}">
                                    <div class="card-counter success">
                                        <h1 class="card-title">Blood Request</h1>
                                        <i class='bx bx-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $blood_requests }}</span>
                                        <span class="count-name">{{ ' Blood Requests' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.user.index') }}">
                                    <div class="card-counter info">
                                        <h1 class="card-title">Blood Supply</h1>
                                        <i class='bx bx-donate-blood icon'></i>
                                        <span class="count-numbers">{{ $blood_supplies }}</span>
                                        <span class="count-name">{{ ' Blood Supplies' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.crossmatch.index') }}">
                                    <div class="card-counter info">
                                        <h1 class="card-title">Crossmatch</h1>
                                        <i class='bx bx-expand icon'></i>
                                        <span class="count-numbers">{{ $crossmatches }}</span>
                                        <span class="count-name">{{ ' Crossmatch' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.doctor.index') }}">
                                    <div class="card-counter success">
                                        <h1 class="card-title">Doctor</h1>
                                        <i class='bx bx-user icon'></i>
                                        <span class="count-numbers">{{ $doctors }}</span>
                                        <span class="count-name">{{ ' Doctors' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.donor.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Donor</h1>
                                        <i class='bx bx-user icon'></i>
                                        <span class="count-numbers">{{ $donors }}</span>
                                        <span class="count-name">{{ ' Donors' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.officer.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Officer</h1>
                                        <i class='bx bx-user icon'></i>
                                        <span class="count-numbers">{{ $officers }}</span>
                                        <span class="count-name">{{ ' Officers' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.patient.index') }}">
                                    <div class="card-counter primary">
                                        <h1 class="card-title">Patient</h1>
                                        <i class='bx bx-user icon'></i>
                                        <span class="count-numbers">{{ $patients }}</span>
                                        <span class="count-name">{{ ' Patients' }}</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('backsite.screening.index') }}">
                                    <div class="card-counter danger">
                                        <h1 class="card-title">Screening</h1>
                                        <i class='bx bx-expand icon'></i>
                                        <span class="count-numbers">{{ $screenings }}</span>
                                        <span class="count-name">{{ ' Screenings' }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

            </div>

        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('after-style')
    <style>
        .management-access {
            margin-bottom: 50px;
        }

        .master-data {
            margin-bottom: 50px;
        }

        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover {
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter .count-numbers {
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
            color: #ffffff;
        }

        .card-counter .count-name {
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
            color: #ffffff;
        }

        .card-counter .card-title {
            font-size: large;
            padding-right: 50px;
            font-weight: 900;
            color: #ffffff;
        }

        .card-counter .icon {
            font-size: 8em;
            color: #DADADA;
            opacity: 0.2;
            position: absolute;
            left: 20px;
            bottom: -60%;
            transform: translateY(-50%);
        }
    </style>
@endpush
