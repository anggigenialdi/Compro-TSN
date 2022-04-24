@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Job Category</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                    Add
                </button>
                @include('admin.master.category.modal-add')
            </div>
            @if (session('success'))
                <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success border-left-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-body">
                <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0">
                    <thead>
                        <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                            <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                            <th style="height:5px;text-align:center;padding:0px;">Category</th>
                            <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pencarian">
                        @foreach ($dataCategory as $jp)
                            <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $jp->category }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    <!-- Edit Modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $jp->id }}" title="Edit">
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
    @include('admin.master.category.modal-edit')
@endsection
