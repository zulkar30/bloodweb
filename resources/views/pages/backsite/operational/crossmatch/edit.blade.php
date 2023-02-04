@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Crossmatch')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Crossmatch</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Crossmatch</li>
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
                                            action="{{ route('backsite.crossmatch.update', [$crossmatch->id]) }}" method="POST"
                                            enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Crossmatch</h4>

                                                <div
                                                    class="form-group row {{ $errors->has('blood_type_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Blood Type <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="blood_type_id" id="blood_type_id"
                                                            class="form-control select2" required>
                                                            <option value="{{ old('blood_type_id', isset($crossmatch) ? $crossmatch->blood_type_id : '') }}" disabled selected>{{ $crossmatch->blood_type->name }}
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
                                                    class="form-group row {{ $errors->has('fase1') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 1 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase1" id="fase1" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('fase1', isset($crossmatch) ? $crossmatch->fase1 : '') }}" disabled selected>
                                                                @if ($crossmatch->fase1 == 1)
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase1 == 2)
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('fase1'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('fase1') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('fase2') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 2 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase2" id="fase2" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('fase2', isset($crossmatch) ? $crossmatch->fase2 : '') }}" disabled selected>
                                                                @if ($crossmatch->fase2 == 1)
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase2 == 2)
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('fase2'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('fase2') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('fase3') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 3 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase3" id="fase3" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('fase3', isset($crossmatch) ? $crossmatch->fase3 : '') }}" disabled selected>
                                                                @if ($crossmatch->fase3 == 1)
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase3 == 2)
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('fase3'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('fase3') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('result') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Result <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="result" id="result" class="form-control select2"
                                                            required>
                                                            <option value="{{ old('result', isset($crossmatch) ? $crossmatch->result : '') }}" disabled selected>
                                                                @if ($crossmatch->result == 1)
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->result == 2)
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('result'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('result') }}</p>
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
                                                            <option value="{{ old('officer_id', isset($crossmatch) ? $crossmatch->officer_id : '') }}" disabled selected>{{ $crossmatch->officer->name }}
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
                                                <a href="{{ route('backsite.crossmatch.index') }}" style="width:120px;"
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
