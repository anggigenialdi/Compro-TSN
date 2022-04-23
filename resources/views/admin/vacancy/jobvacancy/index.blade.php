@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Lamaran</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar lamaran</h6>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-modal">
                    Add
            </button>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0" >
                     <thead>
                          <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                          <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                          <th style="height:5px;text-align:center;padding:0px;">Position</th>
                          <th style="height:5px;text-align:center;padding:0px;">Status</th>
                          <th style="height:5px;text-align:center;padding:0px;">Kategori</th>
                          <th style="height:5px;text-align:center;padding:0px;">Tipe</th>
                          <th style="height:5px;text-align:center;padding:0px;">Tanggal Selesai</th>
                          <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                          </tr>
                          </thead>
                      <tbody id="pencarian">
                          @foreach($vacancies as $vacancy)
                              <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$loop->iteration }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->position}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->active ? 'Aktif' :'Tidak Aktif'}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->category}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->type}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->end_date}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-{{$vacancy->id}}">
                                        Edit
                                </button>
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                    
        </div>
    </div>
</div>
@foreach($vacancies as $v)
@include('admin.vacancy.jobvacancy.modal-edit')
@endforeach
@include('admin.vacancy.jobvacancy.modal-add')
@endsection