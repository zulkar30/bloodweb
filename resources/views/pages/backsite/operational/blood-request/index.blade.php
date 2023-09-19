@extends('layouts.app')

{{-- set title --}}
@section('title', 'Permintaan Darah')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Permintaan Darah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Permintaan Darah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('blood_request_create')
                <div class="content-body">
                    <section id="add-home">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        <a data-action="collapse">
                                            <h4 class="card-title text-white">Tambah Data</h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-content collapse hide">
                                        <div class="card-body card-dashboard">

                                            <form class="form form-horizontal"
                                                action="{{ route('backsite.blood_request.store') }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_br">No BR <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="no_br" name="no_br"
                                                                class="form-control col-md-3" value="{{ old('no_br') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('no_br'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_br') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('no_mr') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">NO MR <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="no_mr" id="no_mr" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Pilih NO
                                                                    MR</option>
                                                                @foreach ($patient as $key => $patient_item)
                                                                    <option value="{{ $patient_item->id }}"
                                                                        data-patient-name="{{ $patient_item->name }}">
                                                                        {{ $patient_item->no_mr }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('no_mr'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_mr') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('patient_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Pasien <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="patient_id" id="patient_id"
                                                                class="form-control select2" disabled>
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Pasien
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('patient_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('patient_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="wb">Darah Lengkap <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="wb" name="wb"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Darah Lengkap" value="{{ old('wb') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('wb'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('wb') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="we">Darah Cuci
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="we" name="we"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Darah Cuci" value="{{ old('we') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('we'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('we') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="prc">Sel Darah Merah
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="prc" name="prc"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Sel Darah Merah" value="{{ old('prc') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('prc'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('prc') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="tc">Trombosit <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="tc" name="tc"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Trombosit" value="{{ old('tc') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('tc'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tc') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="ffp">Plasma Segar Beku
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="ffp" name="ffp"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Plasma Segar Beku" value="{{ old('ffp') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('ffp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('ffp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="cry">Kriosipitat <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="cry" name="cry"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Kriosipitat" value="{{ old('cry') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('cry'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('cry') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="plasma">Plasma <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="plasma" name="plasma"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Plasma" value="{{ old('plasma') }}"
                                                                autocomplete="off">

                                                            @if ($errors->has('plasma'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('plasma') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="prp">Plasma Kaya
                                                            Trombosit <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="prp" name="prp"
                                                                oninput="calculateTotal()" class="form-control"
                                                                placeholder="Plasma Kaya Trombosit"
                                                                value="{{ old('prp') }}" autocomplete="off">

                                                            @if ($errors->has('prp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('prp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="total">Total Permintaan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="total" name="total"
                                                                class="form-control" placeholder="Total Permintaan"
                                                                value="{{ old('total') }}" autocomplete="off" readonly>

                                                            @if ($errors->has('total'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('total') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Dokter <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="doctor_id" id="doctor_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Dokter
                                                                </option>
                                                                @foreach ($doctor as $key => $doctor_item)
                                                                    <option value="{{ $doctor_item->id }}">
                                                                        {{ $doctor_item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('doctor_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('doctor_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('officer_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Petugas <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="officer_id" id="officer_id"
                                                                class="form-control select2">
                                                                <option value="" disabled selected>Choose</option>
                                                                @foreach ($officerOptions as $officerId => $officerName)
                                                                    <option value="{{ $officerId }}"
                                                                        {{ $officerForLoggedInUser && $officerForLoggedInUser->id === $officerId ? 'selected' : '' }}>
                                                                        {{ $officerName }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('officer_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('officer_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="last_br_number" id="last_br_number"
                                                    value="{{ $lastBloodRequestId }}">
                                                <input type="hidden" name="patient_id_hidden" id="patient_id_hidden"
                                                    value="">

                                                <div class="form-actions text-right">
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                        onclick="return confirm('Are you sure want to save this data ?')">
                                                        <i class="la la-check-square-o"></i> Submit
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            @endcan

            {{-- table card --}}
            @can('blood_request_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Permintaan Darah List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No BR</th>
                                                            <th>Nama</th>
                                                            <th>GolDa Permintaan</th>
                                                            <th>Total Permintaan</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($blood_request as $key => $blood_request_item)
                                                            <tr data-entry-id="{{ $blood_request_item->id }}">
                                                                <td>{{ $blood_request_item->no_br }}</td>
                                                                <td>{{ isset($blood_request_item->patient_id) ? $blood_request_item->patient->name : $blood_request_item->name }}
                                                                </td>
                                                                <td>{{ isset($blood_request_item->patient_id) ? $blood_request_item->patient->blood_type->name : $blood_request_item->blood_type->name }}
                                                                </td>
                                                                <td>{{ $blood_request_item->total . ' Komponen' }}</td>
                                                                <td>
                                                                    @if ($blood_request_item->status == 'diterima')
                                                                        <span
                                                                            class="badge badge-success">{{ 'Diterima' }}</span>
                                                                    @elseif($blood_request_item->status == 'menunggu')
                                                                        <span
                                                                            class="badge badge-warning">{{ 'Menunggu' }}</span>
                                                                    @elseif($blood_request_item->status == 'ditolak')
                                                                        <span
                                                                            class="badge badge-danger">{{ 'Ditolak' }}</span>
                                                                    @else
                                                                        <span>{{ 'N/A' }}</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('blood_request_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('backsite.blood_request.show', $blood_request_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="Blood Donor Detail"
                                                                            class="badge badge-info" data-tooltip="Tooltip on top"
                                                                            title="Lihat"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                                                                </path>
                                                                                <path
                                                                                    d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('blood_request_edit')
                                                                        <a href="{{ route('backsite.blood_request.edit', $blood_request_item->id) }}"
                                                                            class="badge badge-warning"
                                                                            data-tooltip="Tooltip on top" title="Edit"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('blood_request_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deleteBloodRequest({{ $blood_request_item->id }})"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                </path>
                                                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @if ($blood_request_item->status == 'menunggu')
                                                                        @can('blood_request_accept')
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#fulfilledModal{{ $blood_request_item->id }}"
                                                                                class="badge badge-success"
                                                                                data-tooltip="Tooltip on top" title="Terima"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z">
                                                                                    </path>
                                                                                </svg></a>
                                                                        @endcan
                                                                        @can('blood_request_reject')
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#rejectModal{{ $blood_request_item->id }}"
                                                                                class="badge badge-danger"
                                                                                data-tooltip="Tooltip on top" title="Tolak"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                    <path
                                                                                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                                                                    </path>
                                                                                </svg></a>
                                                                        @endcan
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No BR</th>
                                                            <th>Nama</th>
                                                            <th>GolDa Permintaan</th>
                                                            <th>Total Permintaan</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

        </div>
    </div>
    <!-- END: Content-->

    @foreach ($blood_request as $key => $blood_request_item)
        <!-- Modal for Fulfilled -->
        <div class="modal fade" id="fulfilledModal{{ $blood_request_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="fulfilledModal{{ $blood_request_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fulfilledModal{{ $blood_request_item->id }}Label">Jumlah Total
                            Terpenuhi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('backsite.blood_request.accept', $blood_request_item->id) }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fulfilledValue">Terpenuhi:</label>
                                <input type="number" name="fulfilled" class="form-control" id="fulfilledValue"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($blood_request as $key => $blood_request_item)
        <!-- Modal for Reject -->
        <div class="modal fade" id="rejectModal{{ $blood_request_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="rejectModal{{ $blood_request_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModal{{ $blood_request_item->id }}Label">Tolak Permintaan
                            Darah
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin menolak Permintaan Darah ini?</p>
                        <form action="{{ route('backsite.blood_request.reject', $blood_request_item->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }
    </style>
@endpush

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#mymodal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });

        $('.default-table').DataTable({
            "order": [],
            "paging": true,
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "pageLength": 10
        });

        $(function() {
            $(":input").inputmask();
        });

        $(document).ready(function() {
            var noBloodRequestInput = $('#no_br');
            var lastBloodRequestNumberInput = $('#last_br_number');

            var lastBloodRequestId = parseInt(lastBloodRequestNumberInput.val());
            var newBloodRequestNumber = lastBloodRequestId + 1;
            var formattedBloodRequestNumber = 'BR' + newBloodRequestNumber.toString().padStart(5, '0');

            noBloodRequestInput.val(formattedBloodRequestNumber);
            lastBloodRequestNumberInput.val(newBloodRequestNumber);
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        function calculateTotal() {
            var wb = Number(document.getElementById('wb').value) || 0;
            var we = Number(document.getElementById('we').value) || 0;
            var prc = Number(document.getElementById('prc').value) || 0;
            var tc = Number(document.getElementById('tc').value) || 0;
            var ffp = Number(document.getElementById('ffp').value) || 0;
            var cry = Number(document.getElementById('cry').value) || 0;
            var plasma = Number(document.getElementById('plasma').value) || 0;
            var prp = Number(document.getElementById('prp').value) || 0;

            var total = wb + we + prc + tc + ffp + cry + plasma + prp;

            document.getElementById('total').value = total + ' Unit';
        }

        function togglePatientBasedOnNoMR() {
            var noMrSelect = $('#no_mr');
            var patientSelect = $('#patient_id');
            var selectedOptionValue = noMrSelect.val();
            var selectedOption = noMrSelect.find('option:selected');
            var patientName = selectedOption.data('patient-name');
            var patientId = selectedOptionValue;

            if (patientName !== null && patientId !== '') {
                patientSelect.empty();
                patientSelect.prop('disabled', true);
                var option = new Option(patientName, patientId);
                patientSelect.append(option);
                $('#patient_id_hidden').val(patientId);
            } else {
                patientSelect.empty();
                patientSelect.append('<option value="" disabled selected>Data tidak ditemukan</option>');
                patientSelect.prop('disabled', true);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            togglePatientBasedOnNoMR();
        });

        $('#no_mr').on('change', function() {
            togglePatientBasedOnNoMR();
        });

        $(document).ready(function() {
            $('[data-tooltip]').tooltip();
        });

        function deleteBloodRequest(bloodRequestId) {
            if (confirm('Anda yakin ingin menghapus data Permintaan Darah ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('backsite.blood_request.destroy', '__id') }}'.replace('__id', bloodRequestId);
                form.method = 'POST';
                form.style.display = 'none';

                var tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = '_token';
                tokenInput.value = '{{ csrf_token() }}';

                var methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';

                form.appendChild(tokenInput);
                form.appendChild(methodInput);
                document.body.appendChild(form);

                form.submit();
            }
        }
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
