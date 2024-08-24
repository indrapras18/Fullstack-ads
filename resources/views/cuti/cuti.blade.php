@extends('layouts.app')

@section('navbrand')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 mb-1">
    <li class="breadcrumb-item text-sm">
    </li>
  </ol>
  <h4 class="font-weight-bolder mb-0">Karyawan</h4>
</nav>
@endsection

@section('content')
<div class="col-md-12">
  <div class="card border-0">
    <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
      <h5 class="mb-0">Data Karyawan</h5>
      {{-- <a href="{{ route('karyawan.create') }}" class="btn btn-primary m-0"> --}}
        {{-- Tambah Data Karyawan --}}
      </a>
    </div>
    <div class="card-body px-2 py-3">
      <div class="table-responsive p-0">
        <table id="myTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="text-center w-5">No</th>
              <th class="text-center w-20">Nomor Induk</th>
              <th class="w-auto">Nama</th>
              <th class="text-center w-20">Tanggal Cuti</th>
              <th class="text-center w-20">Lama Cuti</th>
              <th class="text-center w-20">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
        @foreach($cuti as $karyawan)
            @foreach($karyawan->cutis as $cuti)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $karyawan->nomor_induk }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td class="text-center">{{ $cuti->tanggal_cuti }}</td>
                    <td class="text-center">{{ $cuti->lama_cuti }} hari</td>
                    <td>{{ $cuti->keterangan }}</td>
                </tr>
            @endforeach
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection