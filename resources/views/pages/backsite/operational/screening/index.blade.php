@extends('layouts.app')

{{-- set title --}}
@section('title', 'Skrinning')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Skrinning</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Skrinning</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('screening_create')
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

                                            <form class="form form-horizontal" action="{{ route('backsite.screening.store') }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_sc">No SC <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="no_sc" name="no_sc"
                                                                class="form-control col-md-3" value="{{ old('no_sc') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('no_sc'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_sc') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('aftap_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">No Labu <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="aftap_id" id="aftap_id" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Pilih No
                                                                    Labu
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
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Hasil
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
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Hasil
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
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Hasil
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
                                                            <select name="vdrl" id="vdrl"
                                                                class="form-control select2" onchange="calculateResult()"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Hasil
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
                                                                class="form-control select2" @readonly(true)>
                                                                <option value="{{ '' }}" disabled selected>Hasil
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

                                                    <input type="hidden" name="last_sc_number" id="last_sc_number"
                                                        value="{{ $lastScreeningId }}">

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
            {{-- @can('screening_table') --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Skrinning List</h4>
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
                                                        <th>No Labu</th>
                                                        <th>Pendonor</th>
                                                        <th>Golongan Darah</th>
                                                        <th>Hasil</th>
                                                        <th style="text-align:center; width:150px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($screening as $key => $screening_item)
                                                        <tr data-entry-id="{{ $screening_item->id }}">
                                                            <td>{{ $screening_item->aftap->no_labu ?? '' }}</td>
                                                            <td>{{ $screening_item->aftap->donor->name ?? '' }}</td>
                                                            <td>{{ $screening_item->aftap->donor->blood_type->name ?? '' }}
                                                            </td>
                                                            <td>
                                                                @if ($screening_item->result == 'reaktif')
                                                                    <span
                                                                        class="badge badge-danger">{{ 'Reaktif' }}</span>
                                                                @elseif($screening_item->result == 'non-reaktif')
                                                                    <span
                                                                        class="badge badge-success">{{ 'Non-Reaktif' }}</span>
                                                                @else
                                                                    <span>{{ 'N/A' }}</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @can('screening_show')
                                                                    <a href="#mymodal"
                                                                        data-remote="{{ route('backsite.screening.show', $screening_item->id) }}"
                                                                        data-toggle="modal" data-target="#mymodal"
                                                                        data-title="Screening Detail"
                                                                        class="badge badge-info" data-tooltip="Tooltip on top" title="Lihat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg></a>
                                                                @endcan
                                                                @can('screening_edit')
                                                                    <a href="{{ route('backsite.screening.edit', $screening_item->id) }}"
                                                                        class="badge badge-warning" data-tooltip="Tooltip on top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg></a>
                                                                @endcan
                                                                @can('screening_delete')
                                                                    <a href="#" class="badge badge-danger" data-tooltip="Tooltip on top" title="Hapus"
                                                                        onclick="deleteScreening({{ $screening_item->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></a>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No Labu</th>
                                                        <th>Pendonor</th>
                                                        <th>Golongan Darah</th>
                                                        <th>Hasil</th>
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
            {{-- @endcan --}}

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
        }

        $(document).ready(function() {
            var noScreeningInput = $('#no_sc');
            var lastScreeningNumberInput = $('#last_sc_number');

            var lastScreeningId = parseInt(lastScreeningNumberInput.val());
            var newScreeningNumber = lastScreeningId + 1;
            var formattedScreeningNumber = 'SC' + newScreeningNumber.toString().padStart(5, '0');

            noScreeningInput.val(formattedScreeningNumber);
            lastScreeningNumberInput.val(newScreeningNumber);
        });

        function deleteScreening(screeningId) {
            if (confirm('Anda yakin ingin menghapus data Skrinning ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('backsite.screening.destroy', '__id') }}'.replace('__id', screeningId);
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

        $(document).ready(function() {
            $('[data-tooltip]').tooltip();
        });
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
