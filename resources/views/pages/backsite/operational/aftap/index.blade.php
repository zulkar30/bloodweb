@extends('layouts.app')

{{-- set title --}}
@section('title', 'Aftap')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Aftap</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Aftap</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('aftap_create')
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

                                            <form class="form form-horizontal" action="{{ route('backsite.aftap.store') }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_labu">No Labu <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="no_labu" name="no_labu"
                                                                class="form-control col-md-3" value="{{ old('no_labu') }}"
                                                                autocomplete="off" readonly>

                                                            @if ($errors->has('no_labu'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_labu') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row {{ $errors->has('no_mr') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">NO MR <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="no_mr" id="no_mr" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Pilih NO
                                                                    MR</option>
                                                                @foreach ($patient as $key => $patient_item)
                                                                    <option value="{{ $patient_item->id }}"
                                                                        data-patient-name="{{ $patient_item->name }}">
                                                                        {{ $patient_item->no_mr }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('no_mr'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_mr') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('patient_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Pasien <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="patient_id" id="patient_id"
                                                                class="form-control select2" disabled>
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Pasien
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('patient_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('patient_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('no_reg') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">NO REG <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="no_reg" id="no_reg" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Pilih NO
                                                                    REG</option>
                                                                @foreach ($donor as $key => $donor_item)
                                                                    <option value="{{ $donor_item->id }}"
                                                                        data-donor-name="{{ $donor_item->name }}">
                                                                        {{ $donor_item->no_reg }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('no_reg'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('no_reg') }}</p>
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
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Pendonor
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
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Jenis Kantong
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
                                                                class="form-control" value="{{ old('volume') }}"
                                                                autocomplete="off" placeholder="Jumlah Darah yang Diambil"
                                                                required>

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

                                                <input type="hidden" name="last_labu_number" id="last_labu_number"
                                                    value="{{ $lastAftapId }}">
                                                <input type="hidden" name="patient_id_hidden" id="patient_id_hidden"
                                                    value="">
                                                <input type="hidden" name="donor_id_hidden" id="donor_id_hidden"
                                                    value="">

                                                <div class="form-actions text-right">
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                        onclick="return confirm('Anda yakin ingin menyimpan data ini ?')">
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
            {{-- @can('aftap_table') --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Aftap List</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
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
                                                        <th>Pasien</th>
                                                        <th>Pendonor</th>
                                                        <th>Jenis Kantong</th>
                                                        <th>Jumlah</th>
                                                        <th>Petugas</th>
                                                        <th style="text-align:center; width:150px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($aftap as $key => $aftap_item)
                                                        <tr data-entry-id="{{ $aftap_item->id }}">
                                                            <td>{{ $aftap_item->no_labu ?? '' }}</td>
                                                            <td>{{ $aftap_item->patient->name ?? '' }}</td>
                                                            <td>{{ $aftap_item->donor->name ?? '' }}</td>
                                                            <td>{{ $aftap_item->pouch_type->name ?? '' }}</td>
                                                            <td>{{ $aftap_item->volume . ' Kantong' ?? '' }}</td>
                                                            <td>{{ $aftap_item->officer->name ?? '' }}</td>
                                                            <td class="text-center">
                                                                @can('aftap_show')
                                                                    <a href="#mymodal"
                                                                        data-remote="{{ route('backsite.aftap.show', $aftap_item->id) }}"
                                                                        data-toggle="modal" data-target="#mymodal"
                                                                        data-title="Aftap Detail"
                                                                        class="badge badge-info" data-tooltip="Tooltip on top" title="Lihat"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path></svg></a>
                                                                @endcan
                                                                @can('aftap_edit')
                                                                    <a href="{{ route('backsite.aftap.edit', $aftap_item->id) }}"
                                                                        class="badge badge-warning" data-tooltip="Tooltip on top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg></a>
                                                                @endcan
                                                                @can('aftap_delete')
                                                                    <a href="#" class="badge badge-danger" data-tooltip="Tooltip on top" title="Hapus"
                                                                        onclick="deleteAftap({{ $aftap_item->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></a>
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
                                                        <th>Pasien</th>
                                                        <th>Pendonor</th>
                                                        <th>Jenis Kantong</th>
                                                        <th>Jumlah</th>
                                                        <th>Petugas</th>
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

        $(document).ready(function() {
            var noLabuInput = $('#no_labu');
            var lastLabuNumberInput = $('#last_labu_number');

            var lastAftapId = parseInt(lastLabuNumberInput.val());
            var newLabuNumber = lastAftapId + 1;
            var formattedLabuNumber = 'LABU' + newLabuNumber.toString().padStart(5, '0');

            noLabuInput.val(formattedLabuNumber);
            lastLabuNumberInput.val(newLabuNumber);
        });

        function togglePatientBasedOnNoMR() {
            var noMrSelect = $('#no_mr');
            var patientSelect = $('#patient_id');
            var selectedOptionValue = noMrSelect.val();
            var selectedOption = noMrSelect.find('option:selected');
            var patientName = selectedOption.data('patient-name');
            var patientId = selectedOptionValue;

            if (patientName !== null && patientId !== '') {
                patientSelect.empty();
                patientSelect.prop('disabled', true);
                var option = new Option(patientName, patientId);
                patientSelect.append(option);
                $('#patient_id_hidden').val(patientId);
            } else {
                patientSelect.empty();
                patientSelect.append('<option value="" disabled selected>Data tidak ditemukan</option>');
                patientSelect.prop('disabled', true);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            togglePatientBasedOnNoMR();
        });

        $('#no_mr').on('change', function() {
            togglePatientBasedOnNoMR();
        });

        function togglePendonorBasedOnNoReg() {
            var noRegSelect = $('#no_reg');
            var donorSelect = $('#donor_id');
            var selectedOptionValue = noRegSelect.val();
            var selectedOption = noRegSelect.find('option:selected');
            var donorName = selectedOption.data('donor-name');
            var donorId = selectedOptionValue;

            if (donorName !== null && donorId !== '') {
                donorSelect.empty();
                donorSelect.prop('disabled', true);
                var option = new Option(donorName, donorId);
                donorSelect.append(option);
                $('#donor_id_hidden').val(donorId);
            } else {
                donorSelect.empty();
                donorSelect.append('<option value="" disabled selected>Data tidak ditemukan</option>');
                donorSelect.prop('disabled', true);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            togglePendonorBasedOnNoReg();
        });

        $('#no_reg').on('change', function() {
            togglePendonorBasedOnNoReg();
        });

        function deleteAftap(aftapId) {
            if (confirm('Anda yakin ingin menghapus data Aftap ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('backsite.aftap.destroy', '__id') }}'.replace('__id', aftapId);
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
