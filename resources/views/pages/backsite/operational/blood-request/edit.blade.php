@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Blood Request')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Blood Request</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Blood Request</li>
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
                                            <p>Please complete the input <code>required</code>, before you click the submit
                                                button.</p>
                                        </div>
                                        <form class="form form-horizontal"
                                            action="{{ route('backsite.blood_request.update', [$blood_request->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Blood Request</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="name">Name <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="name" name="name"
                                                            class="form-control"
                                                            placeholder="example dentist or dermatology"
                                                            value="{{ old('name', isset($blood_request) ? $blood_request->patient->name : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('name'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('blood_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Blood Type <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="blood_type_id" id="blood_type_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('blood_type_id', isset($blood_request) ? $blood_request->blood_type_id : '') }}" disabled selected>{{ $blood_request->blood_type->name }}
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
                                                    <label class="col-md-3 label-control" for="wb">Whole Blood <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="wb" name="wb"
                                                            class="form-control" value="{{ old('wb', isset($blood_request) ? $blood_request->wb . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('wb'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('wb') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="we">Whases Eritrosit <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="we" name="we"
                                                            class="form-control" value="{{ old('we', isset($blood_request) ? $blood_request->we . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('we'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('we') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="prc">Packed Red Cell <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="prc" name="prc"
                                                            class="form-control" value="{{ old('prc', isset($blood_request) ? $blood_request->prc . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('prc'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('prc') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="tc">Trombosite Concentrate <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="tc" name="tc"
                                                            class="form-control" value="{{ old('tc', isset($blood_request) ? $blood_request->tc . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('tc'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('tc') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="ffp">Fresh Frozen Plasma <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="ffp" name="ffp"
                                                            class="form-control" value="{{ old('ffp', isset($blood_request) ? $blood_request->ffp . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('ffp'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('ffp') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="cry">Cryocytate <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="cry" name="cry"
                                                            class="form-control" value="{{ old('cry', isset($blood_request) ? $blood_request->cry . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

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
                                                            class="form-control" value="{{ old('plasma', isset($blood_request) ? $blood_request->plasma . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('plasma'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('plasma') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="prp">Platelet Rich Plasma <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="prp" name="prp"
                                                            class="form-control" value="{{ old('prp', isset($blood_request) ? $blood_request->prp . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('prp'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('prp') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="total">Total <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="total" name="total"
                                                            class="form-control" value="{{ old('total', isset($blood_request) ? $blood_request->total . ' Unit' : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            disabled>

                                                        @if ($errors->has('total'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('total') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="fulfilled">Fulfilled <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="number" id="fulfilled" name="fulfilled"
                                                            class="form-control" value="{{ old('fulfilled', isset($blood_request) ? $blood_request->fulfilled : '') }}"
                                                            autocomplete="off" placeholder="example 1 Unit"
                                                            required>

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
                                                        <select name="status" id="status" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('status', isset($blood_request) ? $blood_request->status : '') }}" disabled selected>
                                                                @if ($blood_request->status == 1)
                                                                    <span>{{ 'Approved' }}</span>
                                                                @elseif($blood_request->status == 2)
                                                                    <span>{{ 'Waiting' }}</span>
                                                                @else
                                                                    <span>{{ 'Rejected' }}</span>
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
                                                    <label class="col-md-3 label-control">Doctor <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="doctor_id" id="doctor_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('doctor_id', isset($blood_request) ? $blood_request->doctor_id : '') }}" disabled selected>{{ $blood_request->doctor->name }}
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
                                                    <label class="col-md-3 label-control">Officer <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="officer_id" id="officer_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('officer_id', isset($blood_request) ? $blood_request->officer_id : '') }}" disabled selected>{{ $blood_request->officer->name }}
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
                                                <a href="{{ route('backsite.blood_request.index') }}" style="width:120px;"
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
