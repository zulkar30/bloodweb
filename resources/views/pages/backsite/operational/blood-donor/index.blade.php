@extends('layouts.app')

{{-- set title --}}
@section('title', 'Donor Darah')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Donor Darah</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Donor Darah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('blood_donor_create')
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

                                            <form class="form form-horizontal"
                                                action="{{ route('backsite.blood_donor.store') }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Silahkan masukkan data dengan benar <code>required</code>, sebelum
                                                            anda menekan tombol submit.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="no_bd">No BD <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="no_bd" name="no_bd"
                                                                class="form-control col-md-3" value="{{ old('no_bd') }}"
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
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Pilih No
                                                                    BR
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
                                                                class="form-control" value="{{ old('name') }}"
                                                                autocomplete="off" placeholder="Nama Lengkap" required>

                                                            @if ($errors->has('name'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('name') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('blood_type_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Golongah Darah <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="blood_type_id" id="blood_type_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Pilih
                                                                    Golongah Darah
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
                                                                class="form-control" value="{{ old('hb') }}"
                                                                autocomplete="off" placeholder="Hemoglobin Darah" required>

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
                                                                class="form-control" value="{{ old('t_meter') }}"
                                                                autocomplete="off" placeholder="Tensi Meter" required>

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
                                                                class="form-control" value="{{ old('bb') }}"
                                                                autocomplete="off" placeholder="Berat Badan" required>

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

                                                <input type="hidden" name="last_bd_number" id="last_bd_number"
                                                    value="{{ $lastBloodDonorId }}">

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
            @can('blood_donor_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Donor Darah List</h4>
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
                                                            <th>No BD</th>
                                                            <th>No BR</th>
                                                            <th>Nama</th>
                                                            <th>Golongan Darah</th>
                                                            <th style="text-align:center; width:150px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($blood_donor as $key => $blood_donor_item)
                                                            <tr data-entry-id="{{ $blood_donor_item->id }}">
                                                                <td>{{ $blood_donor_item->no_bd ?? '' }}
                                                                <td>{{ $blood_donor_item->blood_request->no_br ?? '' }}
                                                                </td>
                                                                <td>{{ $blood_donor_item->name ?? '' }}</td>
                                                                <td>{{ $blood_donor_item->blood_type->name ?? '' }}</td>
                                                                <td class="text-center">
                                                                    @can('blood_donor_show')
                                                                        <a href="#mymodal"
                                                                            data-remote="{{ route('backsite.blood_donor.show', $blood_donor_item->id) }}"
                                                                            data-toggle="modal" data-target="#mymodal"
                                                                            data-title="Blood Donor Detail"
                                                                            class="badge badge-info" data-tooltip="Tooltip on top"
                                                                            title="Lihat"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                                                                </path>
                                                                                <path
                                                                                    d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('blood_donor_edit')
                                                                        <a href="{{ route('backsite.blood_donor.edit', $blood_donor_item->id) }}"
                                                                            class="badge badge-warning"
                                                                            data-tooltip="Tooltip on top" title="Edit"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                                                                                </path>
                                                                            </svg></a>
                                                                    @endcan
                                                                    @can('blood_donor_delete')
                                                                        <a href="#" class="badge badge-danger"
                                                                            data-tooltip="Tooltip on top" title="Hapus"
                                                                            onclick="deleteBloodDonor({{ $blood_donor_item->id }})"><svg
                                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                height="20" viewBox="0 0 24 24"
                                                                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                                                                <path
                                                                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                                                </path>
                                                                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                            </svg></a>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No BD</th>
                                                            <th>No BR</th>
                                                            <th>Nama</th>
                                                            <th>Golongan Darah</th>
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
            @endcan

        </div>
    </div>
    <!-- END: Content-->

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

    <style>
        .label {
            cursor: pointer;
        }

        .img-container img {
            max-width: 100%;
        }
    </style>
@endpush

@push('after-script')
    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
    </script>

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
            var noBloodDonorInput = $('#no_bd');
            var lastBloodDonorNumberInput = $('#last_bd_number');

            var lastBloodDonorId = parseInt(lastBloodDonorNumberInput.val());
            var newBloodDonorNumber = lastBloodDonorId + 1;
            var formattedBloodDonorNumber = 'BD' + newBloodDonorNumber.toString().padStart(5, '0');

            noBloodDonorInput.val(formattedBloodDonorNumber);
            lastBloodDonorNumberInput.val(newBloodDonorNumber);
        });

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });

        function deleteBloodDonor(bloodDonorId) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                var form = document.createElement('form');
                form.action = '{{ route('backsite.blood_donor.destroy', '__id') }}'.replace('__id', bloodDonorId);
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
