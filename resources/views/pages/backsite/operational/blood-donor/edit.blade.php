@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Donor Darah')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Donor Darah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Donor Darah</li>
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
                                            action="{{ route('backsite.blood_donor.update', [$blood_donor->id]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Donor Darah</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="no_bd">No BD <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="no_bd" name="no_bd"
                                                            class="form-control col-md-3"
                                                            value="{{ old('no_bd', isset($blood_donor) ? $blood_donor->no_bd : '') }}"
                                                            autocomplete="off" readonly>

                                                        @if ($errors->has('no_bd'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('no_bd') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('blood_request_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">No BR <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="blood_request_id" id="blood_request_id"
                                                            class="form-control select2" disabled>
                                                            <option
                                                                value="{{ old('blood_request_id', isset($blood_donor) ? $blood_donor->blood_request_id : '') }}"
                                                                disabled selected>{{ $blood_donor->blood_request->no_br }}
                                                            </option>
                                                            @foreach ($blood_request as $key => $blood_request_item)
                                                                <option value="{{ $blood_request_item->id }}">
                                                                    {{ $blood_request_item->no_br }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('blood_request_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('blood_request_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="name">Nama <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="name" name="name"
                                                            class="form-control"
                                                            value="{{ old('name', isset($blood_donor) ? $blood_donor->name : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('name'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('blood_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Golongan Darah <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="blood_type_id" id="blood_type_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('blood_type_id', isset($blood_donor) ? $blood_donor->blood_type_id : '') }}"
                                                                disabled selected>{{ $blood_donor->blood_type->name }}
                                                            </option>
                                                            @foreach ($blood_type as $key => $blood_type_item)
                                                                <option value="{{ $blood_type_item->id }}">
                                                                    {{ $blood_type_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('blood_type_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('blood_type_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="hb">Hemoglobin Darah
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="hb" name="hb"
                                                            class="form-control"
                                                            value="{{ old('hb', isset($blood_donor) ? $blood_donor->hb : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('hb'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('hb') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="t_meter">Tensi Meter <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="t_meter" name="t_meter"
                                                            class="form-control"
                                                            value="{{ old('t_meter', isset($blood_donor) ? $blood_donor->t_meter : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('t_meter'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('t_meter') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="bb">Berat Badan <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="bb" name="bb"
                                                            class="form-control"
                                                            value="{{ old('bb', isset($blood_donor) ? $blood_donor->bb : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('bb'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('bb') }}</p>
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
                                                            <option
                                                                value="{{ old('officer_id'), isset($blood_donor) ? $blood_donor->officer_id : '' }}"
                                                                disabled selected>Choose</option>
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
                                    </div>


                                </div>

                                <div class="form-actions text-right">
                                    <a href="{{ route('backsite.blood_donor.index') }}" style="width:120px;"
                                        class="btn bg-blue-grey text-white mr-1"
                                        onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                        <i class="ft-x"></i> Cancel
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
