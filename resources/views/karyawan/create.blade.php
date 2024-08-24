@extends('layouts/app')

@section('navbrand')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 mb-1">
      <li class="breadcrumb-item text-sm">
      </li>
    </ol>
    <h4 class="font-weight-bolder mb-0">Tambah Karyawan</h4>
  </nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card border-0">
        <div class="card-header bg-white d-flex align-items-center justify-content-between pb-0">
            <h5 class="mb-0">Tambah Karyawan</h5>
        </div>
        <div class="card-body bg-white">
            <form method="POST" action="{{ route('karyawan.store') }}" class="d-flex flex-column">
                @csrf
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_induk" class="form-label">Nomor Induk</label>
                    <input type="text" name="nomor_induk" class="form-control @error('nomor_induk') is-invalid @enderror" placeholder="Nomor Induk" value="{{ old('nomor_induk') }}" required>
                    @error('nomor_induk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_bergabung" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_bergabung" class="form-control @error('tanggal_bergabung') is-invalid @enderror" value="{{ old('tanggal_bergabung') }}" required>
                    @error('tanggal_bergabung')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="editor1" rows="10" cols="80" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-end mt-3">
                    <div class="w-50 d-flex align-items-center justify-content-between gap-3">
                        <div class="w-100">
                            <a href="{{ route('karyawan.index') }}" class="btn btn-warning w-100 mb-0">Kembali</a>
                        </div>
                        <div class="w-100">
                            <button class="btn btn-primary w-100 mb-0" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    ClassicEditor
      .create( document.querySelector( '#editor1' ), )
      .catch( error => {
          console.error( error );
      } );
</script>
@endpush