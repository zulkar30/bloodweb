@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Pencocokan Silang')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Pencocokan Silang</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Pencocokan Silang</li>
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
                                            action="{{ route('backsite.crossmatch.update', [$crossmatch->id]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Pencocokan Silang
                                                </h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="no_cm">No CM <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="no_cm" name="no_cm"
                                                            class="form-control col-md-3"
                                                            value="{{ old('no_cm', isset($crossmatch) ? $crossmatch->no_cm : '') }}"
                                                            autocomplete="off" readonly>

                                                        @if ($errors->has('no_cm'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('no_cm') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('screening_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">No Labu <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="screening_id" id="screening_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('screening_id', isset($crossmatch) ? $crossmatch->screening_id : '') }}">
                                                                {{ $crossmatch->screening->aftap->no_labu }}
                                                            </option>
                                                            @foreach ($screening as $key => $screening_item)
                                                                <option value="{{ $screening_item->aftap->id }}">
                                                                    {{ $screening_item->aftap->no_labu }}
                                                                </option>
                                                            @endforeach
                                                        </select>


                                                        @if ($errors->has('screening_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('screening_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('fase1') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 1 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase1" id="fase1" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('fase1', isset($crossmatch) ? $crossmatch->fase1 : '') }}"
                                                                disabled selected>
                                                                @if ($crossmatch->fase1 == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase1 == 'negatif')
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

                                                <div class="form-group row {{ $errors->has('fase2') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 2 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase2" id="fase2" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('fase2', isset($crossmatch) ? $crossmatch->fase2 : '') }}"
                                                                disabled selected>
                                                                @if ($crossmatch->fase2 == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase2 == 'negatif')
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

                                                <div class="form-group row {{ $errors->has('fase3') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Fase 3 <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="fase3" id="fase3" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('fase3', isset($crossmatch) ? $crossmatch->fase3 : '') }}"
                                                                disabled selected>
                                                                @if ($crossmatch->fase3 == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($crossmatch->fase3 == 'negatif')
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
                                                    <label class="col-md-3 label-control">Hasil <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="result" id="result"
                                                            class="form-control select2">
                                                            <option
                                                                value="{{ old('result', isset($crossmatch) ? $crossmatch->result : '') }}"
                                                                disabled selected>
                                                                @if ($crossmatch->result == 'reaktif')
                                                                    <span>{{ 'Reaktif' }}</span>
                                                                @elseif($crossmatch->result == 'non-reaktif')
                                                                    <span>{{ 'Non-Reaktif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Reaktif</option>
                                                            <option value="2">Non-Reaktif</option>
                                                        </select>

                                                        @if ($errors->has('result'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('result') }}</p>
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
                                                                value="{{ old('officer_id', isset($crossmatch) ? $crossmatch->officer_id : '') }}"
                                                                disabled selected>{{ $crossmatch->officer->name }}
                                                            </option>
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

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.crossmatch.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan? Perubahan yang telah Anda lakukan akan hilang.')">
                                                    <i class="ft-x"></i> Batal
                                                </a>
                                                <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                    onclick="return confirm('Anda yakin ingin melanjutkan?')">
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
        function calculateResult() {
            var fase1 = document.getElementById("fase1").value;
            var fase2 = document.getElementById("fase2").value;
            var fase3 = document.getElementById("fase3").value;
            var result = '';

            if (fase1 === '1' && fase2 === '1' && fase3 === '1') {
                result = '1';
            } else if (fase1 === '1' && fase2 === '1' && fase3 === '2') {
                result = '1';
            } else if (fase1 === '1' && fase2 === '2' && fase3 === '1') {
                result = '1';
            } else if (fase1 === '1' && fase2 === '2' && fase3 === '2') {
                result = '2';
            } else if (fase1 === '2' && fase2 === '1' && fase3 === '1') {
                result = '1';
            } else if (fase1 === '2' && fase2 === '1' && fase3 === '2') {
                result = '2';
            } else if (fase1 === '2' && fase2 === '2' && fase3 === '1') {
                result = '2';
            } else if (fase1 === '2' && fase2 === '2' && fase3 === '2') {
                result = '2';
            } else {
                result = '';
            }
            $('#result').val(result).trigger('change');
        }

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
