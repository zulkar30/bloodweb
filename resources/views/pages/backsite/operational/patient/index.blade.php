@extends('layouts.app')

{{-- set title --}}
@section('title', 'Patient')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Patient</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Patient</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('patient_create')
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

                                            <form class="form form-horizontal" action="{{ route('backsite.patient.store') }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Please complete the input <code>required</code>, before you click the
                                                            submit button.</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="name">Name <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" placeholder="example john doe or jane doe"
                                                                value="{{ old('name') }}" autocomplete="off" required>

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
                                                                value="{{ old('birth_place') }}" autocomplete="off" required>

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
                                                                class="form-control" value="{{ old('birth_date') }}"
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
                                                        <label class="col-md-3 label-control" for="contact">Contact <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="contact" name="contact"
                                                                class="form-control" value="{{ old('contact') }}"
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
                                                                class="form-control" value="{{ old('address') }}"
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
                                                                class="form-control" value="{{ old('age') }}"
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
                                                        class="form-group row {{ $errors->has('maintenance_section_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Maintenance Section <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="maintenance_section_id" id="maintenance_section_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                class="form-control" value="{{ old('diagnosis') }}"
                                                                autocomplete="off" placeholder="example Anemia" required>

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
            @can('patient_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Patient List</h4>
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
                                                            <th>Room</th>
                                                            <th>Photo</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($patient as $key => $patient_item)
                                                            <tr data-entry-id="{{ $patient_item->id }}">
                                                                <td>{{ isset($patient_item->created_at) ? date('d/m/Y H:i:s', strtotime($patient_item->created_at)) : '' }}
                                                                </td>
                                                                <td>{{ $patient_item->name ?? '' }}</td>
                                                                <td>{{ $patient_item->room->name ?? '' }}</td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $patient_item->photo }}"
                                                                        class="blue accent-4">Show</a></td>
                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">

                                                                            @can('patient_show')
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.patient.show', $patient_item->id) }}"
                                                                                    data-toggle="modal" data-target="#mymodal"
                                                                                    data-title="Patient Detail"
                                                                                    class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            @endcan

                                                                            @can('patient_edit')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.patient.edit', $patient_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            @endcan

                                                                            @can('patient_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.patient.destroy', $patient_item->id) }}"
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
                                                            <th>Room</th>
                                                            <th>Photo</th>
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
