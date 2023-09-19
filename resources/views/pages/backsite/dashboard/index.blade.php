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
                                <li class="breadcrumb-item">Aktifitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @can('dashboard_super_admin_access')
                    {{-- User --}}
                    <h3 class="content-header-title mb-1 d-inline-block">Manajemen Akses</h3>
                    <div class="row d-flex">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.user.index') }}">
                                <div class="card border-left-danger shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users . ' UA' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2A10.13 10.13 0 0 0 2 12a10 10 0 0 0 4 7.92V20h.1a9.7 9.7 0 0 0 11.8 0h.1v-.08A10 10 0 0 0 22 12 10.13 10.13 0 0 0 12 2zM8.07 18.93A3 3 0 0 1 11 16.57h2a3 3 0 0 1 2.93 2.36 7.75 7.75 0 0 1-7.86 0zm9.54-1.29A5 5 0 0 0 13 14.57h-2a5 5 0 0 0-4.61 3.07A8 8 0 0 1 4 12a8.1 8.1 0 0 1 8-8 8.1 8.1 0 0 1 8 8 8 8 0 0 1-2.39 5.64z">
                                                    </path>
                                                    <path
                                                        d="M12 6a3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4zm0 6a1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- End Data Master --}}
                @endcan

                @can('dashboard_admin_access')
                    {{-- Star  Data Master --}}
                    <h3 class="content-header-title mb-1 d-inline-block">Data Master</h3>
                    <div class="row d-flex">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.permission.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Akses</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $permissions . ' Akses' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.maintenance_section.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Bidang Perawatan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $maintenance_sections . ' Bidang Perawatan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path d="M15 2.013H9V9H2v6h7v6.987h6V15h7V9h-7z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.blood_type.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Golongan Darah</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $blood_types . ' Golongan Darah' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M4 21h9.62a3.995 3.995 0 0 0 3.037-1.397l5.102-5.952a1 1 0 0 0-.442-1.6l-1.968-.656a3.043 3.043 0 0 0-2.823.503l-3.185 2.547-.617-1.235A3.98 3.98 0 0 0 9.146 11H4c-1.103 0-2 .897-2 2v6c0 1.103.897 2 2 2zm0-8h5.146c.763 0 1.448.423 1.789 1.105l.447.895H7v2h6.014a.996.996 0 0 0 .442-.11l.003-.001.004-.002h.003l.002-.001h.004l.001-.001c.011.003.003-.001.003-.001.012 0 .002-.001.002-.001h.001l.002-.001.003-.001.002-.001.002-.001.003-.001.002-.001.002-.001.003-.002.002-.001.002-.001.003-.001.002-.001h.001l.002-.001h.001l.002-.001.002-.001c.011-.001.003-.001.003-.001l.002-.001a.915.915 0 0 0 .11-.078l4.146-3.317c.261-.208.623-.273.94-.167l.557.186-4.133 4.823a2.029 2.029 0 0 1-1.52.688H4v-6zm9.761-10.674C13.3 2.832 11 5.457 11 7.5c0 1.93 1.57 3.5 3.5 3.5S18 9.43 18 7.5c0-2.043-2.3-4.668-2.761-5.174-.379-.416-1.099-.416-1.478 0zM16 7.5c0 .827-.673 1.5-1.5 1.5S13 8.327 13 7.5c0-.708.738-1.934 1.5-2.934.762 1 1.5 2.226 1.5 2.934z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.position.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jabatan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $positions . ' Jabatan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.pouch_type.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jenis Kantong</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $pouch_types . ' Jenis Kantong' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M19.327 3.983H4.746c-.947 0-1.736.726-1.736 1.673v5.396c0 4.892 4.04 8.964 9.026 8.964 4.955 0 8.964-4.072 8.964-8.964V5.656c0-.947-.758-1.673-1.673-1.673zm-2.178 6.691-4.293 4.04c-.221.253-.567.348-.82.348-.315 0-.631-.095-.884-.348l-4.229-4.04c-.441-.473-.504-1.262 0-1.768.475-.441 1.263-.504 1.736 0l3.377 3.251 3.44-3.251c.441-.504 1.23-.441 1.673 0 .442.506.442 1.295 0 1.768z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.donor_type.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jenis Pendonor</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $donor_types . ' Jenis Pendonor' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M17.726 13.02 14 16H9v-1h4.065a.5.5 0 0 0 .416-.777l-.888-1.332A1.995 1.995 0 0 0 10.93 12H3a1 1 0 0 0-1 1v6a2 2 0 0 0 2 2h9.639a3 3 0 0 0 2.258-1.024L22 13l-1.452-.484a2.998 2.998 0 0 0-2.822.504zM15.403 12a3 3 0 0 0 3-3c0-2.708-3-6-3-6s-3 3.271-3 6a3 3 0 0 0 3 3z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.type_user.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Jenis User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $type_users . ' Jenis User' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 10c1.151 0 2-.848 2-2s-.849-2-2-2c-1.15 0-2 .848-2 2s.85 2 2 2zm0 1c-2.209 0-4 1.612-4 3.6v.386h8V14.6c0-1.988-1.791-3.6-4-3.6z">
                                                    </path>
                                                    <path
                                                        d="M19 2H5c-1.103 0-2 .897-2 2v13c0 1.103.897 2 2 2h4l3 3 3-3h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm-5 15-2 2-2-2H5V4h14l.002 13H14z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.profession.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pekerjaan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $professions . ' Pekerjaan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M17.988 22a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h11.988zM9 5h6v2H9V5zm5.25 6.25A2.26 2.26 0 0 1 12 13.501c-1.235 0-2.25-1.015-2.25-2.251S10.765 9 12 9a2.259 2.259 0 0 1 2.25 2.25zM7.5 18.188c0-1.664 2.028-3.375 4.5-3.375s4.5 1.711 4.5 3.375v.563h-9v-.563z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.role.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Peran</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $roles . ' Peran' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.room.index') }}">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Ruangan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rooms . ' Ruangan' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                                                    </path>
                                                    <path
                                                        d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- End Data Master --}}

                    {{-- Start Operasional --}}
                    <h3 class="content-header-title mb-1 d-inline-block">Operasional</h3>
                    <div class="row d-flex">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.aftap.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Aftap</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aftaps . ' Aftap' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M19 15v-3h-2v3h-3v2h3v3h2v-3h3v-2h-.937zM4 7h11v2H4zm0 4h11v2H4zm0 4h8v2H4z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.doctor.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Dokter</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $doctors . ' Dokter' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.blood_donor.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Donor Darah</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $blood_donors . ' Donor Darah' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M17.726 13.02 14 16H9v-1h4.065a.5.5 0 0 0 .416-.777l-.888-1.332A1.995 1.995 0 0 0 10.93 12H3a1 1 0 0 0-1 1v6a2 2 0 0 0 2 2h9.639a3 3 0 0 0 2.258-1.024L22 13l-1.452-.484a2.998 2.998 0 0 0-2.822.504zM15.403 12a3 3 0 0 0 3-3c0-2.708-3-6-3-6s-3 3.271-3 6a3 3 0 0 0 3 3z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.patient.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pasien</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $patients . ' Pasien' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.blood_request.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Permintaan Darah</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $blood_requests . ' Permintaan Darah' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M4 21h9.62a3.995 3.995 0 0 0 3.037-1.397l5.102-5.952a1 1 0 0 0-.442-1.6l-1.968-.656a3.043 3.043 0 0 0-2.823.503l-3.185 2.547-.617-1.235A3.98 3.98 0 0 0 9.146 11H4c-1.103 0-2 .897-2 2v6c0 1.103.897 2 2 2zm0-8h5.146c.763 0 1.448.423 1.789 1.105l.447.895H7v2h6.014a.996.996 0 0 0 .442-.11l.003-.001.004-.002h.003l.002-.001h.004l.001-.001c.011.003.003-.001.003-.001.012 0 .002-.001.002-.001h.001l.002-.001.003-.001.002-.001.002-.001.003-.001.002-.001.002-.001.003-.002.002-.001.002-.001.003-.001.002-.001h.001l.002-.001h.001l.002-.001.002-.001c.011-.001.003-.001.003-.001l.002-.001a.915.915 0 0 0 .11-.078l4.146-3.317c.261-.208.623-.273.94-.167l.557.186-4.133 4.823a2.029 2.029 0 0 1-1.52.688H4v-6zm9.761-10.674C13.3 2.832 11 5.457 11 7.5c0 1.93 1.57 3.5 3.5 3.5S18 9.43 18 7.5c0-2.043-2.3-4.668-2.761-5.174-.379-.416-1.099-.416-1.478 0zM16 7.5c0 .827-.673 1.5-1.5 1.5S13 8.327 13 7.5c0-.708.738-1.934 1.5-2.934.762 1 1.5 2.226 1.5 2.934z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.crossmatch.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pencocokan Silang</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $crossmatches . ' Pencocokan Silang' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.donor.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pendonor</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $donors . ' Pendonor' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.officer.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Petugas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $officers . ' Petugas' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.screening.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Skrinning</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $screenings . ' Skrinning' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M3 4v5h2V5h4V3H4a1 1 0 0 0-1 1zm18 5V4a1 1 0 0 0-1-1h-5v2h4v4h2zm-2 10h-4v2h5a1 1 0 0 0 1-1v-5h-2v4zM9 21v-2H5v-4H3v5a1 1 0 0 0 1 1h5zM2 11h20v2H2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('backsite.blood_supply.index') }}">
                                <div class="card border-left-primary shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Stok Darah</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $blood_supplies . ' Stok Darah' }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72"
                                                    viewBox="0 0 24 24"
                                                    style="fill: rgba(201, 198, 198, 1);transform: ;msFilter:;">
                                                    <path
                                                        d="M6 19h1v3h2v-3h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H9V2H7v3H6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1zM7 7h2v10H7zm7 10h1v3h2v-3h1a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1V4h-2v3h-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm1-8h2v6h-2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
