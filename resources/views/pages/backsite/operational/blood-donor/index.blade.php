@extends('layouts.app')

{{-- set title --}}
@section('title', 'Blood Donor')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Blood Donor</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Blood Donor</li>
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
                                            <h4 class="card-title text-white">Add Data</h4>
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
                                                        <p>Please complete the input <code>required</code>, before you click the
                                                            submit button.</p>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('donor_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Donor <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="donor_id" id="donor_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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

                                                    <div class="form-group row {{ $errors->has('gender') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Gender <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="gender" id="gender" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                            <input type="number" id="age" name="age"
                                                                class="form-control" value="{{ old('age') }}"
                                                                autocomplete="off" placeholder="example 27 Tahun" required>

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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                            <select name="donor_reaction" id="donor_reaction"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
                                                                </option>
                                                                <option value="1">Pingsan</option>
                                                                <option value="2">Mual</option>
                                                                <option value="3">Lainnya</option>
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
                                                            <select name="retrieval_process" id="retrieval_process"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
                                                                </option>
                                                                <option value="1">Lancar</option>
                                                                <option value="2">Macet</option>
                                                                <option value="3">Lainnya</option>
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
                                                            <select name="donor_status" id="donor_status"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
            @can('blood_donor_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Blood Donor List</h4>
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
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Donor Status</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($blood_donor as $key => $blood_donor_item)
                                                            <tr data-entry-id="{{ $blood_donor_item->id }}">
                                                                <td>{{ isset($blood_donor_item->created_at) ? date('d/m/Y H:i:s', strtotime($blood_donor_item->created_at)) : '' }}
                                                                </td>
                                                                <td>{{ $blood_donor_item->donor->name ?? '' }}</td>
                                                                <td>
                                                                    @if ($blood_donor_item->donor_status == 1)
                                                                        <span
                                                                            class="badge badge-success">{{ 'Pendonor Baru' }}</span>
                                                                    @elseif($blood_donor_item->donor_status == 2)
                                                                        <span
                                                                            class="badge badge-warning">{{ 'Pendonor Lama' }}</span>
                                                                    @else
                                                                        <span>{{ 'N/A' }}</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">

                                                                            @can('blood_donor_show')
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.blood_donor.show', $blood_donor_item->id) }}"
                                                                                    data-toggle="modal" data-target="#mymodal"
                                                                                    data-title="Blood Donor Detail"
                                                                                    class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            @endcan

                                                                            @can('blood_donor_edit')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.blood_donor.edit', $blood_donor_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            @endcan

                                                                            @can('blood_donor_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.blood_donor.destroy', $blood_donor_item->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                                    <input type="hidden" name="_method"
                                                                                        value="DELETE">
                                                                                    <input type="hidden" name="_token"
                                                                                        value="{{ csrf_token() }}">
                                                                                    <input type="submit" class="dropdown-item"
                                                                                        value="Delete">
                                                                                </form>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Donor Status</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
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

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })

            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2-full-bg')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })
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

        // fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
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
