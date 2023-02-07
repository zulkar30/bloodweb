@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Blood Donor')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Blood Donor</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Blood Donor</li>
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
                                            action="{{ route('backsite.blood_donor.update', [$blood_donor->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Blood Donor</h4>

                                                <div
                                                    class="form-group row {{ $errors->has('donor') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Donor <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="donor" id="donor"
                                                            class="form-control select2">
                                                            <option value="{{ old('donor', isset($blood_donor) ? $blood_donor->donor : '') }}" disabled selected>{{ $blood_donor->donor->name }}
                                                            </option>
                                                            @foreach ($donor as $key => $donor_item)
                                                                <option value="{{ $donor_item->id }}">
                                                                    {{ $donor_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('donor'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('donor') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('gender') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Gender <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="gender" id="gender" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('gender', isset($blood_donor) ? $blood_donor->gender : '') }}" disabled selected>
                                                                @if ($blood_donor->gender ==1)
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
                                                    <label class="col-md-3 label-control" for="age">Age <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="age" name="age"
                                                            class="form-control" value="{{ old('age', isset($blood_donor) ? $blood_donor->age . ' Tahun' : '') }}"
                                                            autocomplete="off" placeholder="example 27 Tahun"
                                                            required>

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
                                                            <option value="{{ old('blood_type_id', isset($blood_donor) ? $blood_donor->blood_type_id : '') }}" disabled selected>{{ $blood_donor->blood_type->name }}
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
                                                    class="form-group row {{ $errors->has('donor_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Donor Type <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="donor_type_id" id="donor_type_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('donor_type_id', isset($blood_donor) ? $blood_donor->donor_type_id : '') }}" disabled selected>{{ $blood_donor->donor_type->name }}
                                                            </option>
                                                            @foreach ($donor_type as $key => $donor_type_item)
                                                                <option value="{{ $donor_type_item->id }}">
                                                                    {{ $donor_type_item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('donor_type_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('donor_type_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('pouch_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Pouch Type <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="pouch_type_id" id="pouch_type_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('pouch_type_id', isset($blood_donor) ? $blood_donor->pouch_type_id : '') }}" disabled selected>{{ $blood_donor->pouch_type->name }}
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

                                                <div
                                                    class="form-group row {{ $errors->has('donor_reaction') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Donor Reaction <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="donor_reaction" id="donor_reaction" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('donor_reaction', isset($blood_donor) ? $blood_donor->donor_reaction : '') }}" disabled selected>
                                                                @if ($blood_donor->donor_reaction ==1)
                                                                    <span>Pingsan</span>
                                                                @elseif($blood_donor->donor_reaction ==2)
                                                                    <span>Mual</span>
                                                                @else
                                                                    <span>Dll</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Pingsan</option>
                                                            <option value="2">Mual</option>
                                                            <option value="3">Dll</option>
                                                        </select>

                                                        @if ($errors->has('donor_reaction'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('donor_reaction') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('retrieval_process') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Retrieval Process <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="retrieval_process" id="retrieval_process" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('retrieval_process', isset($blood_donor) ? $blood_donor->retrieval_process : '') }}" disabled selected>
                                                                @if ($blood_donor->retrieval_process ==1)
                                                                    <span>Lancar</span>
                                                                @elseif($blood_donor->retrieval_process ==2)
                                                                    <span>Macet</span>
                                                                @else
                                                                    <span>Dll</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Lancar</option>
                                                            <option value="2">Macet</option>
                                                            <option value="3">Dll</option>
                                                        </select>

                                                        @if ($errors->has('retrieval_process'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('retrieval_process') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('donor_status') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Donor Status <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="donor_status" id="donor_status" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('donor_status', isset($blood_donor) ? $blood_donor->donor_status : '') }}" disabled selected>
                                                                @if ($blood_donor->donor_status ==1)
                                                                    <span>Pendonor Baru</span>
                                                                @else
                                                                    <span>Pendonor Lama</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Pendonor Baru</option>
                                                            <option value="2">Pendonor Lama</option>
                                                        </select>

                                                        @if ($errors->has('donor_status'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('donor_status') }}</p>
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
                                                            <option value="{{ old('officer_id', isset($blood_donor) ? $blood_donor->officer_id : '') }}" disabled selected>{{ $blood_donor->officer->name }}
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
