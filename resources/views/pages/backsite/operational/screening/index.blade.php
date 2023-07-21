@extends('layouts.app')

{{-- set title --}}
@section('title', 'Screening')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Screening</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Screening</li>
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

                                            <form class="form form-horizontal" action="{{ route('backsite.screening.store') }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-body">
                                                    <div class="form-section">
                                                        <p>Please complete the input <code>required</code>, before you click the
                                                            submit button.</p>
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
                                                        class="form-group row {{ $errors->has('hiv') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">HIV <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="hiv" id="hiv"
                                                                class="form-control select2" onchange="calculateResult()" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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

                                                    <div
                                                        class="form-group row {{ $errors->has('hcv') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">HCV <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="hcv" id="hcv"
                                                                class="form-control select2" onchange="calculateResult()" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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

                                                    <div
                                                        class="form-group row {{ $errors->has('hbsag') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">HBSAG <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="hbsag" id="hbsag"
                                                                class="form-control select2" onchange="calculateResult()" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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

                                                    <div
                                                        class="form-group row {{ $errors->has('vdrl') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">VDRL <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="vdrl" id="vdrl"
                                                                class="form-control select2" onchange="calculateResult()" required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                        <label class="col-md-3 label-control">Result <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="result" id="result"
                                                                class="form-control select2" disabled required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                    <h4 class="card-title">Screening List</h4>
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
                                                        <th>Blood Type</th>
                                                        <th>Result</th>
                                                        <th style="text-align:center; width:150px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($screening as $key => $screening_item)
                                                        <tr data-entry-id="{{ $screening_item->id }}">
                                                            <td>{{ isset($screening_item->created_at) ? date('d/m/Y H:i:s', strtotime($screening_item->created_at)) : '' }}
                                                            </td>
                                                            <td>{{ $screening_item->blood_type->name ?? '' }}</td>
                                                            <td>
                                                                @if ($screening_item->result == 1)
                                                                    <span class="badge badge-danger">{{ 'Reaktif' }}</span>
                                                                @elseif($screening_item->result == 2)
                                                                    <span class="badge badge-success">{{ 'Non-Reaktif' }}</span>
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

                                                                        @can('screening_show')
                                                                            <a href="#mymodal"
                                                                                data-remote="{{ route('backsite.screening.show', $screening_item->id) }}"
                                                                                data-toggle="modal" data-target="#mymodal"
                                                                                data-title="Screening Detail"
                                                                                class="dropdown-item">
                                                                                Show
                                                                            </a>
                                                                        @endcan

                                                                        @can('screening_edit')
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('backsite.screening.edit', $screening_item->id) }}">
                                                                                Edit
                                                                            </a>
                                                                        @endcan

                                                                        @can('screening_delete')
                                                                            <form
                                                                                action="{{ route('backsite.screening.destroy', $screening_item->id) }}"
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
                                                        <th>Blood Type</th>
                                                        <th>Result</th>
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
            
            $('#result_hidden').val(result);
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
