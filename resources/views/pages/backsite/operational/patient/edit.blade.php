@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Patient')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Patient</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Patient</li>
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
                                            action="{{ route('backsite.patient.update', [$patient->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Patient</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="name">Name <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="name" name="name"
                                                            class="form-control"
                                                            placeholder="example dentist or dermatology"
                                                            value="{{ old('name', isset($patient) ? $patient->name : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('name'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="birth_place">Birth Place
                                                        <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="birth_place" name="birth_place"
                                                            class="form-control" placeholder="example Bengkalis"
                                                            value="{{ old('birth_place', isset($patient) ? $patient->birth_place : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('birth_place'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('birth_place') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="birth_date">Birth Date <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="date" id="birth_date" name="birth_date"
                                                            class="form-control"
                                                            value="{{ old('birth_date', isset($patient) ? $patient->birth_date : '') }}"
                                                            autocomplete="off" required>

                                                        @if ($errors->has('birth_date'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('birth_date') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('gender') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Gender <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="gender" id="gender" class="form-control select2"
                                                            required>
                                                            <option
                                                                value="{{ old('gender', isset($patient) ? $patient->gender : '') }}"
                                                                disabled selected>
                                                                @if ($patient->gender == 1)
                                                                    <span>Laki-laki</span>
                                                                @else
                                                                    <span>Perempuan</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>

                                                        @if ($errors->has('gender'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('gender') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="contact">Contact <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="contact" name="contact"
                                                            class="form-control"
                                                            value="{{ old('contact', isset($patient) ? $patient->contact : '') }}"
                                                            autocomplete="off" placeholder="example +628xxxxxxxxxx"
                                                            required>

                                                        @if ($errors->has('contact'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('contact') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="address">Address <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="address" name="address"
                                                            class="form-control"
                                                            value="{{ old('address', isset($patient) ? $patient->address : '') }}"
                                                            autocomplete="off"
                                                            placeholder="example Jalan Pramuka Gang Haji Ilyas" required>

                                                        @if ($errors->has('address'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('address') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="age">Age <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="age" name="age"
                                                            class="form-control"
                                                            value="{{ old('age', isset($patient) ? $patient->age : '') }}"
                                                            autocomplete="off" placeholder="example 23 Tahun" required>

                                                        @if ($errors->has('age'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('age') }}</p>
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
                                                            <option
                                                                value="{{ old('blood_type_id', isset($patient) ? $patient->blood_type_id : '') }}"
                                                                disabled selected>{{ $patient->blood_type->name }}
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

                                                <div
                                                    class="form-group row {{ $errors->has('maintenance_section_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Maintenance Section <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="maintenance_section_id" id="maintenance_section_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('maintenance_section_id', isset($patient) ? $patient->maintenance_section_id : '') }}"
                                                                disabled selected>{{ $patient->maintenance_section->name }}
                                                            </option>
                                                            @foreach ($maintenance_section as $key => $maintenance_section_item)
                                                                <option value="{{ $maintenance_section_item->id }}">
                                                                    {{ $maintenance_section_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('maintenance_section_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('maintenance_section_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('room_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Room <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="room_id" id="room_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('room_id', isset($patient) ? $patient->room_id : '') }}"
                                                                disabled selected>{{ $patient->room->name }}
                                                            </option>
                                                            @foreach ($room as $key => $room_item)
                                                                <option value="{{ $room_item->id }}">
                                                                    {{ $room_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('room_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('room_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="diagnosis">Diagnosis <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="diagnosis" name="diagnosis"
                                                            class="form-control"
                                                            value="{{ old('diagnosis', isset($patient) ? $patient->diagnosis : '') }}"
                                                            autocomplete="off" placeholder="example 23 Tahun" required>

                                                        @if ($errors->has('diagnosis'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('diagnosis') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="photo">Photo <code
                                                            style="color:green;">optional</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <div class="custom-file">
                                                            <input type="file"
                                                                accept="image/png, image/svg, image/jpeg"
                                                                class="custom-file-input" id="photo" name="photo">
                                                            <label class="custom-file-label" for="photo"
                                                                aria-describedby="photo">Choose File</label>
                                                        </div>

                                                        <p class="text-muted"><small class="text-danger">Hanya dapat
                                                                mengunggah 1 file</small><small> dan yang dapat digunakan
                                                                JPEG, SVG, PNG & Maksimal ukuran file hanya 10
                                                                MegaBytes</small></p>

                                                        @if ($errors->has('photo'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('photo') }}</p>
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.patient.index') }}" style="width:120px;"
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
