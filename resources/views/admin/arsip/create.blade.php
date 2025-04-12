@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h3 class="text-center">FORM PENDATAAN SURAT</h3>
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label class="form-label">Nama Dokumen :</label>
        <input type="text" name="namaDokumen" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Pengirim :</label>
        <input type="text" name="namaPengirim" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama Penerima :</label>
        <input type="text" name="namaPenerima" class="form-control" required>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label class="form-label">Kategori Surat :</label>
          <select name="kategori" class="form-select" required>
            <option value="">Kategori</option>
            <option value="Masuk">Masuk</option>
            <option value="Keluar">Keluar</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Tujuan Surat :</label>
          <select name="tujuan" class="form-select" required>
            <option value="">Tujuan</option>
            <option value="Pendidikan">Pendidikan</option>
            <option value="Pemerintahan">Pemerintahan</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Upload File :</label>
          <input type="file" name="file" class="form-control">
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-dark px-4 py-2">Kirim</button>
      </div>
    </form>
  </div>
@endsection

<style>
body {
  background-color: #f8f9fa;
}
</style>