@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Permintaan Darah')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Permintaan Darah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Permintaan Darah</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                anda menekan tombol submit.</p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('backsite.blood_request.update', [$blood_request->id]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Permintaan Darah
                                                </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="no_br">No BR <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="no_br" name="no_br"
                                                            class="form-control col-md-3" value="{{ old('no_br', isset($blood_request) ? $blood_request->no_br : '') }}"
                                                            autocomplete="off" readonly>

                                                        @if ($errors->has('no_br'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('no_br') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('patient_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Nama <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="patient_id" id="patient_id"
                                                            class="form-control select2" disabled>
                                                            <option
                                                                value="{{ old('patient_id', isset($blood_request->patient_id) ? $blood_request->patient_id : $blood_request->name) }}"
                                                                disabled selected>{{ isset($blood_request->patient_id) ? $blood_request->patient->name : $blood_request->name }}
                                                            </option>
                                                            @foreach ($patient as $key => $patient_item)
                                                                <option value="{{ $patient_item->id }}">
                                                                    {{ $patient_item->no_mr }}
                                                                </option>
                                                            @endforeach
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
                                                        <input type="text" id="wb" name="wb"
                                                            class="form-control"
                                                            value="{{ old('wb', isset($blood_request) ? $blood_request->wb . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

                                                        @if ($errors->has('wb'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('wb') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="we">Darah Cuci <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="we" name="we"
                                                            class="form-control"
                                                            value="{{ old('we', isset($blood_request) ? $blood_request->we . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="prc" name="prc"
                                                            class="form-control"
                                                            value="{{ old('prc', isset($blood_request) ? $blood_request->prc . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="tc" name="tc"
                                                            class="form-control"
                                                            value="{{ old('tc', isset($blood_request) ? $blood_request->tc . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="ffp" name="ffp"
                                                            class="form-control"
                                                            value="{{ old('ffp', isset($blood_request) ? $blood_request->ffp . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="cry" name="cry"
                                                            class="form-control"
                                                            value="{{ old('cry', isset($blood_request) ? $blood_request->cry . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="plasma" name="plasma"
                                                            class="form-control"
                                                            value="{{ old('plasma', isset($blood_request) ? $blood_request->plasma . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                        <input type="text" id="prp" name="prp"
                                                            class="form-control"
                                                            value="{{ old('prp', isset($blood_request) ? $blood_request->prp . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

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
                                                            class="form-control"
                                                            value="{{ old('total', isset($blood_request) ? $blood_request->total . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Komponen" disabled>

                                                        @if ($errors->has('total'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('total') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="fulfilled">Terpenuhi <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" id="fulfilled" name="fulfilled"
                                                            class="form-control"
                                                            value="{{ old('fulfilled', isset($blood_request) ? $blood_request->fulfilled . ' Komponen' : '') }}"
                                                            autocomplete="off" placeholder="Jumlah Komponen yang Terpenuhi" readonly>

                                                        @if ($errors->has('fulfilled'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('fulfilled') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('status') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Status <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="status" id="status"
                                                            class="form-control select2" disabled>
                                                            <option
                                                                value="{{ old('status', isset($blood_request) ? $blood_request->status : '') }}"
                                                                disabled selected>
                                                                @if ($blood_request->status == 'diterima')
                                                                    <span>{{ 'Diterima' }}</span>
                                                                @elseif($blood_request->status == 'menunggu')
                                                                    <span>{{ 'Menunggu' }}</span>
                                                                @else
                                                                    <span>{{ 'Ditolak' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Setuju</option>
                                                            <option value="3">Tolak</option>
                                                        </select>

                                                        @if ($errors->has('status'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('status') }}</p>
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
                                                            <option
                                                                value="{{ old('doctor_id', isset($blood_request->doctor_id) ? $blood_request->doctor_id : 'Tidak Ada') }}"
                                                                disabled selected>{{ isset($blood_request->doctor_id) ? $blood_request->doctor->name : 'Tidak Ada' }}
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
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('officer_id', isset($blood_request->officer_id) ? $blood_request->officer_id : 'Tidak Ada') }}"
                                                                disabled selected>{{ isset($blood_request->officer_id) ? $blood_request->officer->name : 'Tidak Ada' }}
                                                            </option>
                                                            @foreach ($officer as $key => $officer_item)
                                                                <option value="{{ $officer_item->id }}">
                                                                    {{ $officer_item->name }}
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

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.blood_request.index') }}"
                                                    style="width:120px;" class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
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

        </div>
    </div>
    <!-- END: Content-->

@endsection


@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
