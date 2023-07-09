@extends('layouts.app')

{{-- set title --}}
@section('title', 'Blood Request')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Blood Request</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Blood Request</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('blood_request_create')
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
                                                action="{{ route('backsite.blood_request.store') }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Please complete the input <code>required</code>, before you click the
                                                            submit button.</p>
                                                    </div>

                                                    <div
                                                        class="form-group row {{ $errors->has('patient_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Patient <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="patient_id" id="patient_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
                                                                </option>
                                                                @foreach ($patient as $key => $patient_item)
                                                                    <option value="{{ $patient_item->id }}">
                                                                        {{ $patient_item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('patient_id'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('patient_id') }}</p>
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

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="wb">Whole Blood <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="wb" name="wb" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('wb') }}" autocomplete="off" required>

                                                            @if ($errors->has('wb'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('wb') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="we">Washes Eritrosit
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="we" name="we" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('we') }}" autocomplete="off" required>

                                                            @if ($errors->has('we'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('we') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="prc">Packed Red Cell
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="prc" name="prc" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('prc') }}" autocomplete="off" required>

                                                            @if ($errors->has('prc'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('prc') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="tc">Trombosite
                                                            Concentrate <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="tc" name="tc" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('tc') }}" autocomplete="off" required>

                                                            @if ($errors->has('tc'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('tc') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="ffp">Fresh Frozen
                                                            Plasma <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="ffp" name="ffp" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('ffp') }}" autocomplete="off" required>

                                                            @if ($errors->has('ffp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('ffp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="cry">Cryocypate <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="cry" name="cry" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('cry') }}" autocomplete="off" required>

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
                                                            <input type="number" id="plasma" name="plasma" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('plasma') }}" autocomplete="off" required>

                                                            @if ($errors->has('plasma'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('plasma') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="prp">Platelet Rich
                                                            Plasma <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="number" id="prp" name="prp" oninput="calculateTotal()"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('prp') }}" autocomplete="off" required>

                                                            @if ($errors->has('prp'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('prp') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="total">Total Permintaan
                                                            <code style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="total" name="total"
                                                                class="form-control" placeholder="example 1 Unit"
                                                                value="{{ old('total') }}" autocomplete="off" readonly>

                                                            @if ($errors->has('total'))
                                                                <p style="font-style: bold; color: red;">
                                                                    {{ $errors->first('total') }}</p>
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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
            @can('blood_request_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Blood Request List</h4>
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
                                                            <th>Blood Type</th>
                                                            <th>Total Request</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($blood_request as $key => $blood_request_item)
                                                            <tr data-entry-id="{{ $blood_request_item->id }}">
                                                                <td>{{ isset($blood_request_item->created_at) ? date('d/m/Y H:i:s', strtotime($blood_request_item->created_at)) : '' }}
                                                                </td>
                                                                <td>
                                                                    @if (empty($blood_request_item->name))
                                                                        {{ $blood_request_item->patient->name ?? '' }}
                                                                    @else
                                                                        {{ $blood_request_item->name }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $blood_request_item->blood_type->name }}</td>
                                                                <td>{{ $blood_request_item->total . ' Unit' }}</td>
                                                                <td>
                                                                    @if ($blood_request_item->status == 1)
                                                                        <span
                                                                            class="badge badge-success">{{ 'Approved' }}</span>
                                                                    @elseif($blood_request_item->status == 2)
                                                                        <span
                                                                            class="badge badge-warning">{{ 'Waiting' }}</span>
                                                                    @elseif($blood_request_item->status == 3)
                                                                        <span
                                                                            class="badge badge-danger">{{ 'Rejected' }}</span>
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

                                                                            @can('blood_request_show')
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.blood_request.show', $blood_request_item->id) }}"
                                                                                    data-toggle="modal" data-target="#mymodal"
                                                                                    data-title="Blood Request Detail"
                                                                                    class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            @endcan

                                                                            @can('blood_request_edit')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.blood_request.edit', $blood_request_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            @endcan

                                                                            @can('blood_request_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.blood_request.destroy', $blood_request_item->id) }}"
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

                                                                            @if ($blood_request_item->status == 2)
                                                                                @can('blood_request_accept')
                                                                                    <a href="#" class="dropdown-item"
                                                                                        data-toggle="modal"
                                                                                        data-target="#fulfilledModal{{ $blood_request_item->id }}">
                                                                                        Accept
                                                                                    </a>
                                                                                @endcan

                                                                                @can('blood_request_reject')
                                                                                    <a href="#" class="dropdown-item"
                                                                                        data-toggle="modal"
                                                                                        data-target="#rejectModal{{ $blood_request_item->id }}">
                                                                                        Reject
                                                                                    </a>
                                                                                @endcan
                                                                            @endif

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
                                                            <th>Blood Type</th>
                                                            <th>Total Request</th>
                                                            <th>Status</th>
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

    @foreach ($blood_request as $key => $blood_request_item)
        <!-- Modal for Fulfilled -->
        <div class="modal fade" id="fulfilledModal{{ $blood_request_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="fulfilledModal{{ $blood_request_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fulfilledModal{{ $blood_request_item->id }}Label">Enter Fulfilled
                            Value</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('backsite.blood_request.accept', $blood_request_item->id) }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fulfilledValue">Fulfilled Value:</label>
                                <input type="number" name="fulfilled" class="form-control" id="fulfilledValue"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Accept</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($blood_request as $key => $blood_request_item)
        <!-- Modal for Reject -->
        <div class="modal fade" id="rejectModal{{ $blood_request_item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="rejectModal{{ $blood_request_item->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModal{{ $blood_request_item->id }}Label">Reject Blood Request
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to reject this blood request?</p>
                        <form action="{{ route('backsite.blood_request.reject', $blood_request_item->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


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

        function calculateTotal() {
            // Get the input field values
            var wb = Number(document.getElementById('wb').value) || 0;
            var we = Number(document.getElementById('we').value) || 0;
            var prc = Number(document.getElementById('prc').value) || 0;
            var tc = Number(document.getElementById('tc').value) || 0;
            var ffp = Number(document.getElementById('ffp').value) || 0;
            var cry = Number(document.getElementById('cry').value) || 0;
            var plasma = Number(document.getElementById('plasma').value) || 0;
            var prp = Number(document.getElementById('prp').value) || 0;

            // Calculate the total
            var total = wb + we + prc + tc + ffp + cry + plasma + prp;

            // Update the total input field value
            document.getElementById('total').value = total + ' Unit';
        }
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
