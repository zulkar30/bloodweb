@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Skrinning')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Skrinning</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Skrinning</li>
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
                                            action="{{ route('backsite.screening.update', [$screening->id]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Skrinning</h4>

                                                <div
                                                    class="form-group row {{ $errors->has('aftap_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">No Labu <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="aftap_id" id="aftap_id" class="form-control select2"
                                                            disabled>
                                                            <option
                                                                value="{{ old('aftap_id', isset($screening) ? $screening->aftap_id : '') }}"
                                                                disabled selected>{{ $screening->aftap->no_labu }}
                                                            </option>
                                                            @foreach ($aftap as $key => $aftap_item)
                                                                <option value="{{ $aftap_item->id }}">
                                                                    {{ $aftap_item->no_labu }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('aftap_id'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('aftap_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('hiv') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">HIV <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="hiv" id="hiv" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('hiv', isset($screening) ? $screening->hiv : '') }}"
                                                                disabled selected>
                                                                @if ($screening->hiv == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($screening->hiv == 'negatif')
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('hiv'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('hiv') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('hcv') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">HCV <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="hcv" id="hcv" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('hcv', isset($screening) ? $screening->hcv : '') }}"
                                                                disabled selected>
                                                                @if ($screening->hcv == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($screening->hcv == 'negatif')
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('hcv'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('hcv') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('hbsag') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">HBSAG <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="hbsag" id="hbsag" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('hbsag', isset($screening) ? $screening->hbsag : '') }}"
                                                                disabled selected>
                                                                @if ($screening->hbsag == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($screening->hbsag == 'negatif')
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('hbsag'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('hbsag') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('vdrl') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">VDRL <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="vdrl" id="vdrl" class="form-control select2"
                                                            onchange="calculateResult()" required>
                                                            <option
                                                                value="{{ old('vdrl', isset($screening) ? $screening->vdrl : '') }}"
                                                                disabled selected>
                                                                @if ($screening->vdrl == 'positif')
                                                                    <span>{{ 'Positif' }}</span>
                                                                @elseif($screening->vdrl == 'negatif')
                                                                    <span>{{ 'Negatif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </option>
                                                            <option value="1">Positif</option>
                                                            <option value="2">Negatif</option>
                                                        </select>

                                                        @if ($errors->has('vdrl'))
                                                            <p style="font-style: bold; color: red;">
                                                                {{ $errors->first('vdrl') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row {{ $errors->has('result') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Hasil <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="result" id="result"
                                                            class="form-control select2" disabled>
                                                            <option
                                                                value="{{ old('result', isset($screening) ? $screening->result : '') }}"
                                                                disabled selected>
                                                                @if ($screening->result == 'reaktif')
                                                                    <span>{{ 'Reaktif' }}</span>
                                                                @elseif($screening->result == 'non-reaktif')
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

                                                <input type="hidden" name="result" id="result_hidden" value="">

                                                <div
                                                    class="form-group row {{ $errors->has('officer_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Petugas <code
                                                            style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="officer_id" id="officer_id"
                                                            class="form-control select2" required>
                                                            <option
                                                                value="{{ old('officer_id', isset($screening) ? $screening->officer_id : '') }}"
                                                                disabled selected>{{ $screening->officer->name }}
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
                                                <a href="{{ route('backsite.screening.index') }}" style="width:120px;"
                                                    class="btn bg-blue-grey text-white mr-1"
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
        function calculateResult() {
            var hiv = document.getElementById("hiv").value;
            var hcv = document.getElementById("hcv").value;
            var hbsag = document.getElementById("hbsag").value;
            var vdrl = document.getElementById("vdrl").value;
            var result = '';

            if (hiv === '1' && hcv === '1' && hbsag === '1' && vdrl === '1') {
                result = '1';
            } else if (hiv === '1' && hcv === '1' && hbsag === '1' && vdrl === '2') {
                result = '1';
            } else if (hiv === '1' && hcv === '1' && hbsag === '2' && vdrl === '1') {
                result = '1';
            } else if (hiv === '1' && hcv === '1' && hbsag === '2' && vdrl === '2') {
                result = '1';
            } else if (hiv === '1' && hcv === '2' && hbsag === '1' && vdrl === '1') {
                result = '1';
            } else if (hiv === '1' && hcv === '2' && hbsag === '1' && vdrl === '2') {
                result = '1';
            } else if (hiv === '1' && hcv === '2' && hbsag === '2' && vdrl === '1') {
                result = '1';
            } else if (hiv === '1' && hcv === '2' && hbsag === '2' && vdrl === '2') {
                result = '2';
            } else if (hiv === '2' && hcv === '1' && hbsag === '1' && vdrl === '1') {
                result = '1';
            } else if (hiv === '2' && hcv === '1' && hbsag === '1' && vdrl === '2') {
                result = '1';
            } else if (hiv === '2' && hcv === '1' && hbsag === '2' && vdrl === '1') {
                result = '1';
            } else if (hiv === '2' && hcv === '1' && hbsag === '2' && vdrl === '2') {
                result = '2';
            } else if (hiv === '2' && hcv === '2' && hbsag === '1' && vdrl === '1') {
                result = '1';
            } else if (hiv === '2' && hcv === '2' && hbsag === '1' && vdrl === '2') {
                result = '2';
            } else if (hiv === '2' && hcv === '2' && hbsag === '2' && vdrl === '2') {
                result = '2';
            } else {
                result = '';
            }
            $('#result').val(result).trigger('change');

            $('#result_hidden').val(result);
        }

        $(function() {
            $(":input").inputmask();
        });
    </script>
@endpush
