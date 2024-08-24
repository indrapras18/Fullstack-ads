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
      <a href="{{ route('karyawan.create') }}" class="btn btn-primary m-0">
        Tambah Data Karyawan
      </a>
    </div>
    <div class="card-body px-2 py-3">
      <div class="table-responsive p-0">
        <table id="myTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="text-center w-5">No</th>
              <th class="w-auto">Nama</th>
              <th class="text-center w-20">Nomor Induk</th>
              <th class="text-center w-20">Tanggal Lahir</th>
              <th class="text-center w-20">Tanggal Bergabung</th>
              <th class="text-center w-20">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach($all as $item)
              <tr>
                <th class="text-center">{{ $no++ }}</th>
                <th>{{ $item->nama }}</th>
                <th>{{ $item->nomor_induk }}</th>
                <th>{{ $item->tanggal_lahir }}</th>
                <th>{{ $item->tanggal_bergabung }}</th>
                <th class="d-flex align-items-center justify-content-center gap-2">
                    <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-warning mb-0">
                      <i class="fa-solid fa-pen-to-square fa-xl"></i>
                    </a>
                    <button class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                      <i class="fa-solid fa-trash fa-xl"></i>
                    </button>
                </th>
              </tr>

              <!-- Modal Delete -->
              <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data Karyawan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="text-center mb-5">
                          <i class="fa-solid fa-trash text-danger" style="font-size: 10rem;"></i>
                        </div>
                        @if ($errors->has('nama'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                        @endif
                        <div class="d-flex align-items-center justify-content-between gap-3">
                          <button type="button" class="btn btn-secondary w-100 m-0" data-bs-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-danger w-100 m-0">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection