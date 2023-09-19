<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i
                        class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Aplikasi</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>
            {{-- @can('management_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                        class="menu-title" data-i18n="Management Access">Manajemen Akses</span></a>
                <ul class="menu-content">

                    @can('user_access')
                        <li
                            class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.user.index') }}">
                                <i></i><span>User</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('master_data_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/blood_type') || request()->is('backsite/blood_type/*') || request()->is('backsite/*/blood_type') || request()->is('backsite/*/blood_type/*') || request()->is('backsite/donor_type') || request()->is('backsite/donor_type/*') || request()->is('backsite/*/donor_type') || request()->is('backsite/*/donor_type/*') || request()->is('backsite/maintenance_section') || request()->is('backsite/maintenance_section/*') || request()->is('backsite/*/maintenance_section') || request()->is('backsite/*/maintenance_section/*') || request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') || request()->is('backsite/position') || request()->is('backsite/position/*') || request()->is('backsite/*/position') || request()->is('backsite/*/position/*') || request()->is('backsite/pouch_type') || request()->is('backsite/pouch_type/*') || request()->is('backsite/*/pouch_type') || request()->is('backsite/*/pouch_type/*') || request()->is('backsite/profession') || request()->is('backsite/profession/*') || request()->is('backsite/*/profession') || request()->is('backsite/*/profession/*') || request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') || request()->is('backsite/room') || request()->is('backsite/room/*') || request()->is('backsite/*/room') || request()->is('backsite/*/room/*') || request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                        class="menu-title" data-i18n="Master Data">Data Master</span></a>
                <ul class="menu-content">

                    @can('permission_access')
                        <li
                            class="{{ request()->is('backsite/permission') || request()->is('backsite/permission/*') || request()->is('backsite/*/permission') || request()->is('backsite/*/permission/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.permission.index') }}">
                                <i></i><span>Akses</span>
                            </a>
                        </li>
                    @endcan

                    @can('maintenance_section_access')
                        <li
                            class="{{ request()->is('backsite/maintenance_section') || request()->is('backsite/maintenance_section/*') || request()->is('backsite/*/maintenance_section') || request()->is('backsite/*/maintenance_section/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.maintenance_section.index') }}">
                                <i></i><span>Bidang Perawatan</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_type_access')
                        <li
                            class="{{ request()->is('backsite/blood_type') || request()->is('backsite/blood_type/*') || request()->is('backsite/*/blood_type') || request()->is('backsite/*/blood_type/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_type.index') }}">
                                <i></i><span>Golongan Darah</span>
                            </a>
                        </li>
                    @endcan

                    @can('position_access')
                        <li
                            class="{{ request()->is('backsite/position') || request()->is('backsite/position/*') || request()->is('backsite/*/position') || request()->is('backsite/*/position/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.position.index') }}">
                                <i></i><span>Jabatan</span>
                            </a>
                        </li>
                    @endcan

                    @can('pouch_type_access')
                        <li
                            class="{{ request()->is('backsite/pouch_type') || request()->is('backsite/pouch_type/*') || request()->is('backsite/*/pouch_type') || request()->is('backsite/*/pouch_type/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.pouch_type.index') }}">
                                <i></i><span>Jenis Kantong</span>
                            </a>
                        </li>
                    @endcan

                    @can('donor_type_access')
                        <li
                            class="{{ request()->is('backsite/donor_type') || request()->is('backsite/donor_type/*') || request()->is('backsite/*/donor_type') || request()->is('backsite/*/donor_type/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.donor_type.index') }}">
                                <i></i><span>Jenis Pendonor</span>
                            </a>
                        </li>
                    @endcan

                    @can('type_user_access')
                        <li
                            class="{{ request()->is('backsite/type_user') || request()->is('backsite/type_user/*') || request()->is('backsite/*/type_user') || request()->is('backsite/*/type_user/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.type_user.index') }}">
                                <i></i><span>Jenis User</span>
                            </a>
                        </li>
                    @endcan

                    @can('profession_access')
                        <li
                            class="{{ request()->is('backsite/profession') || request()->is('backsite/profession/*') || request()->is('backsite/*/profession') || request()->is('backsite/*/profession/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.profession.index') }}">
                                <i></i><span>Pekerjaan</span>
                            </a>
                        </li>
                    @endcan

                    @can('role_access')
                        <li
                            class="{{ request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.role.index') }}">
                                <i></i><span>Peran</span>
                            </a>
                        </li>
                    @endcan

                    @can('room_access')
                        <li
                            class="{{ request()->is('backsite/room') || request()->is('backsite/room/*') || request()->is('backsite/*/room') || request()->is('backsite/*/room/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.room.index') }}">
                                <i></i><span>Ruangan</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('operational_access') --}}
            <li class=" nav-item"><a href="#"><i
                        class="{{ request()->is('backsite/aftap') || request()->is('backsite/aftap/*') || request()->is('backsite/*/aftap') || request()->is('backsite/*/aftap/*') || request()->is('backsite/blood_donor') || request()->is('backsite/blood_donor/*') || request()->is('backsite/*/blood_donor') || request()->is('backsite/*/blood_donor/*') || request()->is('backsite/blood_request') || request()->is('backsite/blood_request/*') || request()->is('backsite/*/blood_request') || request()->is('backsite/*/blood_request/*') || request()->is('backsite/blood_supply') || request()->is('backsite/blood_supply/*') || request()->is('backsite/*/blood_supply') || request()->is('backsite/*/blood_supply/*') || request()->is('backsite/crossmatch') || request()->is('backsite/crossmatch/*') || request()->is('backsite/*/crossmatch') || request()->is('backsite/*/crossmatch/*') || request()->is('backsite/doctor') || request()->is('backsite/doctor/*') || request()->is('backsite/*/doctor') || request()->is('backsite/*/doctor/*') || request()->is('backsite/donor') || request()->is('backsite/donor/*') || request()->is('backsite/*/donor') || request()->is('backsite/*/donor/*') || request()->is('backsite/officer') || request()->is('backsite/officer/*') || request()->is('backsite/*/officer') || request()->is('backsite/*/officer/*') || request()->is('backsite/patient') || request()->is('backsite/patient/*') || request()->is('backsite/*/patient') || request()->is('backsite/*/patient/*') || request()->is('backsite/screening') || request()->is('backsite/screening/*') || request()->is('backsite/*/screening') || request()->is('backsite/*/screening/*')? 'bx bx-hive bx-flashing': 'bx bx-hive' }}"></i><span
                        class="menu-title" data-i18n="Operational">Operasional</span></a>
                <ul class="menu-content">

                    @can('aftap_access')
                        <li
                            class="{{ request()->is('backsite/aftap') || request()->is('backsite/aftap/*') || request()->is('backsite/*/aftap') || request()->is('backsite/*/aftap/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.aftap.index') }}">
                                <i></i><span>Aftap</span>
                            </a>
                        </li>
                    @endcan

                    @can('doctor_access')
                        <li
                            class="{{ request()->is('backsite/doctor') || request()->is('backsite/doctor/*') || request()->is('backsite/*/doctor') || request()->is('backsite/*/doctor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.doctor.index') }}">
                                <i></i><span>Dokter</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_donor_access')
                        <li
                            class="{{ request()->is('backsite/blood_donor') || request()->is('backsite/blood_donor/*') || request()->is('backsite/*/blood_donor') || request()->is('backsite/*/blood_donor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_donor.index') }}">
                                <i></i><span>Donor Darah</span>
                            </a>
                        </li>
                    @endcan

                    @can('patient_access')
                        <li
                            class="{{ request()->is('backsite/patient') || request()->is('backsite/patient/*') || request()->is('backsite/*/patient') || request()->is('backsite/*/patient/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.patient.index') }}">
                                <i></i><span>Pasien</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_request_access')
                        <li
                            class="{{ request()->is('backsite/blood_request') || request()->is('backsite/blood_request/*') || request()->is('backsite/*/blood_request') || request()->is('backsite/*/blood_request/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_request.index') }}">
                                <i></i><span>Permintaan Darah</span>
                            </a>
                        </li>
                    @endcan

                    @can('crossmatch_access')
                        <li
                            class="{{ request()->is('backsite/crossmatch') || request()->is('backsite/crossmatch/*') || request()->is('backsite/*/crossmatch') || request()->is('backsite/*/crossmatch/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.crossmatch.index') }}">
                                <i></i><span>Pencocokan Silang</span>
                            </a>
                        </li>
                    @endcan

                    @can('donor_access')
                        <li
                            class="{{ request()->is('backsite/donor') || request()->is('backsite/donor/*') || request()->is('backsite/*/donor') || request()->is('backsite/*/donor/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.donor.index') }}">
                                <i></i><span>Pendonor</span>
                            </a>
                        </li>
                    @endcan

                    @can('officer_access')
                        <li
                            class="{{ request()->is('backsite/officer') || request()->is('backsite/officer/*') || request()->is('backsite/*/officer') || request()->is('backsite/*/officer/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.officer.index') }}">
                                <i></i><span>Petugas</span>
                            </a>
                        </li>
                    @endcan

                    @can('screening_access')
                        <li
                            class="{{ request()->is('backsite/screening') || request()->is('backsite/screening/*') || request()->is('backsite/*/screening') || request()->is('backsite/*/screening/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.screening.index') }}">
                                <i></i><span>Skrinning</span>
                            </a>
                        </li>
                    @endcan

                    @can('blood_supply_access')
                        <li
                            class="{{ request()->is('backsite/blood_supply') || request()->is('backsite/blood_supply/*') || request()->is('backsite/*/blood_supply') || request()->is('backsite/*/blood_supply/*') ? 'active' : '' }} ">
                            <a class="menu-item" href="{{ route('backsite.blood_supply.index') }}">
                                <i></i><span>Stok Darah</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
