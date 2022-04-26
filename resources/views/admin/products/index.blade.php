@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Products</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Products</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                    Add
                </button>
                @include('admin.products.modal-add')
            </div>

            <div>
                {!! Toastr::message() !!}
            </div>

            <div class="card-body">
                <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0">
                    <thead>
                        <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                            <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                            <th style="height:5px;text-align:center;padding:0px;">Title</th>
                            <th style="height:5px;text-align:center;padding:0px;">Description</th>
                            <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pencarian">
                        @foreach ($dataProduct as $pr)
                            <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $pr->title }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $pr->description }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    <!-- Edit Modal -->
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editModal{{ $pr->id }}" title="Edit">
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
    @include('admin.products.javascript')
    @include('admin.products.modal-edit')
@endsection
