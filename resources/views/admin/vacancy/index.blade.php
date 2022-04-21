@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pelamar</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pelamar</h6>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-stripped table-hover" id="dataTable" cellspacing="0" >
                     <thead>
                          <tr style="height:5px;text-align:center;padding:0px;font-size:12px;background-color:#DCDCDC">
                          <th style="height:5px;text-align:center;padding:0px;width:10px;">No</th>
                          <th style="height:5px;text-align:center;padding:0px;">Email</th>
                          <th style="height:5px;text-align:center;padding:0px;">Nama</th>
                          <th style="height:5px;text-align:center;padding:0px;">No Telp.</th>
                          <th style="height:5px;text-align:center;padding:0px;">Posisi</th>
                          <th style="height:5px;text-align:center;padding:0px;">Pengalaman</th>
                          <th style="height:5px;text-align:center;padding:0px;">Aksi</th>
                          </tr>
                          </thead>
                      <tbody id="pencarian">
                          @foreach($vacancies as $vacancy)
                              <tr>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$loop->iteration }}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->email}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->full_name}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->phone_number}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->job_position}}</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">{{$vacancy->work_experience}} Tahun</td>
                                <td style="height:5px;text-align:center;padding:0px;font-size:12px;">
                                <a class="btn btn-sm btn-primary" href="{{ asset('resume/{$vacancy->file_resume}') }}" target ="_blank">
                                    Lihat CV
                                </a>
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
        </div>
    </div>
</div>
@endsection