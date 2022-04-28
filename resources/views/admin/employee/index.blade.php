@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employee</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Employee</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                    Add
                </button>
                @include('admin.employee.modal-add')
            </div>
            <div>
                {!! Toastr::message() !!}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0">
                    <thead>
                        <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                            <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                            <th style="height:5px;text-align:center;padding:0px;">Full Name</th>
                            <th style="height:5px;text-align:center;padding:0px;">Job Position</th>
                            <th style="height:5px;text-align:center;padding:0px;">Job Type</th>
                            <th style="height:5px;text-align:center;padding:0px;">Picture</th>
                            <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pencarian">
                        @foreach ($dataEmployee as $employee)
                            <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $employee->full_name }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $employee->job_position }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $employee->type }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    <img src="{{ asset('../employee/' . $employee->profile_picture) }}"  title="image preview"
                                        class="img-thumbnail" width="45rem" height="45rem"> 
                                </td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    <!-- Edit Modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $employee->id }}" title="Edit">
                                        Edit
                                        <i class="fas fa-cogs"></i>
                                    </button>
                                    <!-- End -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.employee.javascript')
    @include('admin.employee.modal-edit')
@endsection
