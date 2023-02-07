@extends('layouts.app')

{{-- set title --}}
@section('title', 'Crossmatch')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Crossmatch</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Crossmatch</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            @can('crossmatch_create')
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

                                            <form class="form form-horizontal" action="{{ route('backsite.crossmatch.store') }}"
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

                                                    <div class="form-group row {{ $errors->has('fase1') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Fase 1 <code
                                                                style="color:red;">required</code></label>
                                                        <div class="col-md-9 mx-auto">
                                                            <select name="fase1" id="fase1" class="form-control select2"
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
                                                                required>
                                                                <option value="{{ '' }}" disabled selected>Choose
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
            {{-- @can('crossmatch_table') --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crossmatch List</h4>
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
                                                    @forelse($crossmatch as $key => $crossmatch_item)
                                                        <tr data-entry-id="{{ $crossmatch_item->id }}">
                                                            <td>{{ isset($crossmatch_item->created_at) ? date('d/m/Y H:i:s', strtotime($crossmatch_item->created_at)) : '' }}
                                                            </td>
                                                            <td>{{ $crossmatch_item->blood_type->name ?? '' }}</td>
                                                            <td>
                                                                @if ($crossmatch_item->result == 1)
                                                                    <span
                                                                        class="badge badge-danger">{{ 'Reaktif' }}</span>
                                                                @elseif($crossmatch_item->result == 2)
                                                                    <span
                                                                        class="badge badge-success">{{ 'Non-Reaktif' }}</span>
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

                                                                        @can('crossmatch_show')
                                                                            <a href="#mymodal"
                                                                                data-remote="{{ route('backsite.crossmatch.show', $crossmatch_item->id) }}"
                                                                                data-toggle="modal" data-target="#mymodal"
                                                                                data-title="Crossmatch Detail"
                                                                                class="dropdown-item">
                                                                                Show
                                                                            </a>
                                                                        @endcan

                                                                        @can('crossmatch_edit')
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('backsite.crossmatch.edit', $crossmatch_item->id) }}">
                                                                                Edit
                                                                            </a>
                                                                        @endcan

                                                                        @can('crossmatch_delete')
                                                                            <form
                                                                                action="{{ route('backsite.crossmatch.destroy', $crossmatch_item->id) }}"
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
