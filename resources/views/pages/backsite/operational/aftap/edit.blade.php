@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Aftap')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Aftap</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Aftap</li>
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
                                            action="{{ route('backsite.aftap.update', [$aftap->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Aftap</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="no_labu">No Labu <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="no_labu" name="no_labu"
                                                            class="form-control col-md-3"
                                                            value="{{ old('no_labu', isset($aftap) ? $aftap->no_labu : '') }}"
                                                            autocomplete="off" readonly>

                                                        @if ($errors->has('no_labu'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('no_labu') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('patient_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Pasien <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="patient_id" id="patient_id" class="form-control select2"
                                                            required>
                                                            <option
                                                                value="{{ old('patient_id', isset($aftap) ? $aftap->patient_id : '') }}"
                                                                disabled selected>{{ $aftap->patient->name }}
                                                            </option>
                                                            @foreach ($patient as $key => $patient_item)
                                                                <option value="{{ $patient_item->id }}">
                                                                    {{ $patient_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('patient_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('patient_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('donor_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Pendonor <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="donor_id" id="donor_id" class="form-control select2"
                                                            required>
                                                            <option
                                                                value="{{ old('donor_id', isset($aftap) ? $aftap->donor_id : '') }}"
                                                                disabled selected>{{ $aftap->donor->name }}
                                                            </option>
                                                            @foreach ($donor as $key => $donor_item)
                                                                <option value="{{ $donor_item->id }}">
                                                                    {{ $donor_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('donor_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('donor_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('pouch_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Jenis Kantong <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="pouch_type_id" id="pouch_type_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('pouch_type_id', isset($aftap) ? $aftap->pouch_type_id : '') }}"
                                                                disabled selected>{{ $aftap->pouch_type->name }}
                                                            </option>
                                                            @foreach ($pouch_type as $key => $pouch_type_item)
                                                                <option value="{{ $pouch_type_item->id }}">
                                                                    {{ $pouch_type_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('pouch_type_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('pouch_type_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="volume">Jumlah <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" id="volume" name="volume"
                                                            class="form-control"
                                                            value="{{ old('volume', isset($aftap) ? $aftap->volume : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('volume'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('volume') }}</p>
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
                                                                value="{{ old('officer_id', isset($aftap) ? $aftap->officer_id : '') }}"
                                                                disabled selected>{{ $aftap->officer->name }}
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
                                                <a href="{{ route('backsite.aftap.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Anda yakin ingin membatalkan perubahan ini? Semua perubahan yang Anda lakukan akan hilang.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
                                                <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                    onclick="return confirm('Anda yakin ingin melakukan perubahan pada data Aftap ini ?')">
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
