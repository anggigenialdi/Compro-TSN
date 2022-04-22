@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Data</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Job Position</h6><br>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                    Add
                </button>
                @include('admin.position.modal-add')
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0">
                    <thead>
                        <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                            <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                            <th style="height:5px;text-align:center;padding:0px;">Posisi</th>
                            <th style="height:5px;text-align:center;padding:0px;">Category</th>
                            <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pencarian">
                        @foreach ($dataJobPosition as $jp)
                            <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $jp->position }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                    {{ $jp->category }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
