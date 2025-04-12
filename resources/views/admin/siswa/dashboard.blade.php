@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Siswa</h2>
    <div class="mb-3">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">Tambah</button>
        <button class="btn btn-success">Import Excel</button>
    </div>
    <div class="mb-3 d-flex justify-content-between align-items-center">
    <div>
        <label>
            
            <span id="shownCount">Menampilkan 0 dari {{ count($siswas) }}</span>
        </label>
    </div>
    <div class="d-flex align-items-center">
        <label for="searchInput" class="me-2 mb-0">Search :</label>
        <input type="text" name="search" id="searchInput" class="form-control w-auto" placeholder="Cari..." value="{{ request('search') }}">
    </div>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="siswaTableBody">
            @foreach($siswas as $siswa)
            <tr id="row_{{ $siswa->id }}">
            <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
            <td>{{ $siswa->nama }}</td>     <!-- Nama siswa -->
            <td>{{ $siswa->status }}</td>   <!-- Status -->
            <td>{{ $siswa->tanggal_masuk }}</td> <!-- Tanggal Masuk -->
        <td>{{ $siswa->tanggal_keluar ?? '-' }}</td> <!-- Tanggal Keluar -->
        <td>
                <button 
    class="btn btn-primary edit-btn" 
    data-id="{{ $siswa->id }}" 
    data-nama="{{ $siswa->nama }}" 
    data-status="{{ $siswa->status }}" 
    data-tanggal-masuk="{{ $siswa->tanggal_masuk }}" 
    data-tanggal-keluar="{{ $siswa->tanggal_keluar }}" 
    data-bs-toggle="modal" 
    data-bs-target="#editStudentModal">✏️</button>

                    <button class="btn btn-danger delete-btn" data-id="{{ $siswa->id }}">🗑️</button>
                </td>
            </tr>
            @endforeach
        </tbody>
       
<!-- Modal Tambah Data Siswa -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen"> <!-- Menggunakan modal-fullscreen untuk tampilan penuh -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0d47a1; color: white;"> <!-- Menggunakan warna custom -->
                <h5 class="modal-title" id="addStudentModalLabel">Tambah Data Siswa</h5>
                
            </div>
            <div class="modal-body">
            <form id="addStudentForm" action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" name="status" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_keluar" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Data Siswa -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Data Siswa</h5>
            </div>
            <div class="modal-body">
                <form id="editStudentForm">
                    @csrf
                    <input type="hidden" id="editId">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" id="editStatus" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="editTanggalMasuk" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="editTanggalKeluar" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery harus dimuat dulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- AJAX Script -->
<script >

    
    $(document).ready(function () {

         // 🔍 Fitur Pencarian dengan Update Jumlah Tampilan
         $('#searchInput').on('keyup', function () {
            let value = $(this).val().toLowerCase();
            let visibleCount = 0;

            $('#siswaTableBody tr').each(function () {
                let isMatch = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(isMatch);
                if (isMatch) visibleCount++;
            });

            // 🧮 Update jumlah entri yang tampil
            $('#shownCount').text(`Menampilkan ${visibleCount} dari {{ count($siswas) }}`);
        });
        // 🟢 Tambah Data Siswa
        $('#addStudentForm').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('siswa.store') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        let siswa = response.siswa;
                        let row = `
                            <tr id="row_${siswa.id}">
                                <td>${siswa.id}</td>
                                <td>${siswa.nama}</td>
                                <td>${siswa.status}</td>
                                <td>${siswa.tanggal_masuk}</td>
                                <td>${siswa.tanggal_keluar ?? '-'}</td>
                                <td>
                                    <button class="btn btn-primary edit-btn" data-id="${siswa.id}" data-nama="${siswa.nama}" data-status="${siswa.status}" data-tanggal-masuk="${siswa.tanggal_masuk}" data-tanggal-keluar="${siswa.tanggal_keluar}" data-bs-toggle="modal" data-bs-target="#editStudentModal">✏️</button>
                                    <button class="btn btn-danger delete-btn" data-id="${siswa.id}">🗑️</button>
                                </td>
                            </tr>
                        `;
                        $('#siswaTableBody').append(row);
                        $('#addStudentModal').modal('hide');
                        $('#addStudentForm')[0].reset();
                        alert("Data siswa berhasil ditambahkan!");
                    } else {
                        alert("Terjadi kesalahan saat menambahkan data.");
                    }
                },
                error: function (xhr) {
                    alert("Error: " + xhr.responseText);
                }
            });
        });

    // 🖊️ Event untuk tombol Edit
    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let status = $(this).data('status');
        let tanggalMasuk = $(this).data('tanggal-masuk');
        let tanggalKeluar = $(this).data('tanggal-keluar');

        // Isi form dalam modal
        $('#editId').val(id);
        $('#editNama').val(nama);
        $('#editStatus').val(status);
        $('#editTanggalMasuk').val(tanggalMasuk);
        $('#editTanggalKeluar').val(tanggalKeluar);

        // Tampilkan modal edit
        $('#editStudentModal').modal('show');
    });

    // 📝 Kirim Form Edit ke Server
$('#editStudentForm').off('submit').on('submit', function (e) {
    e.preventDefault();

    let id = $('#editId').val();
    let formData = {
        _token: "{{ csrf_token() }}",
        _method: "PUT", // Laravel menerima update dengan PUT
        nama: $('#editNama').val(),
        status: $('#editStatus').val(),
        tanggal_masuk: $('#editTanggalMasuk').val(),
        tanggal_keluar: $('#editTanggalKeluar').val()
    };

    $.ajax({
        url: `/siswa/${id}`,
        type: "POST", // Laravel hanya menerima POST, gunakan _method: PUT
        data: formData,
        success: function (response) {
            if (response.success) {
                let siswa = response.siswa;

                // 🔄 Update tampilan tabel tanpa reload
                let updatedRow = `
                    <td>${siswa.id}</td>
                    <td>${siswa.nama}</td>
                    <td>${siswa.status}</td>
                    <td>${siswa.tanggal_masuk}</td>
                    <td>${siswa.tanggal_keluar ?? '-'}</td>
                    <td>
                        <button class="btn btn-primary edit-btn"
                            data-id="${siswa.id}"
                            data-nama="${siswa.nama}"
                            data-status="${siswa.status}"
                            data-tanggal-masuk="${siswa.tanggal_masuk}"
                            data-tanggal-keluar="${siswa.tanggal_keluar}"
                            data-bs-toggle="modal"
                            data-bs-target="#editStudentModal">
                            ✏️
                        </button>
                        <button class="btn btn-danger delete-btn" data-id="${siswa.id}">🗑️</button>
                    </td>
                `;

                // Ganti isi row dengan data baru dan beri efek highlight kuning
                $(`#row_${id}`).html(updatedRow).addClass('table-warning');

                // Efek highlight hanya 2 detik
                setTimeout(() => {
                    $(`#row_${id}`).removeClass('table-warning');
                }, 2000);

                // Tutup modal edit
                $('#editStudentModal').modal('hide');

                alert("Data siswa berhasil diperbarui!");
            } else {
                alert("Gagal memperbarui data.");
            }
        },
        error: function (xhr) {
            alert("Error: " + xhr.responseText);
        }
    });
});




        // 🔴 Hapus Data Siswa
        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');
            if (confirm("Apakah kamu yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: `/siswa/${id}`,
                    type: "POST", // Laravel hanya menerima POST
                    data: {
                        _method: "DELETE",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            $(`#row_${id}`).remove();
                            alert("Data siswa berhasil dihapus!");
                        } else {
                            alert("Gagal menghapus data.");
                        }
                    },
                    error: function (xhr) {
                        alert("Error: " + xhr.responseText);
                    }
                });
            }
        });
    });

    $(document).ready(function () {
    $('#searchInput').on('keyup', function () {
        let value = $(this).val().toLowerCase();
        $('#siswaTableBody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>



@endsection
