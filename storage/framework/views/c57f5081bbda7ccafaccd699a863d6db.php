

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Data Siswa</h2>
    <div class="mb-3">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">Tambah</button>
        <button class="btn btn-success">Import Excel</button>
    </div>
    <div class="mb-3 d-flex justify-content-between">
        <div>
            <label>Show
                <select class="form-select d-inline w-auto mx-2">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select> entries
            </label>
        </div>
        <input type="text" class="form-control w-auto" placeholder="Search...">
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
        <tbody>
            <tr>
                <td>1</td>
                <td>rika</td>
                <td>siswa</td>
                <td>12-06-2022</td>
                <td>28-04-2025</td>
                <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2">✏️</button>
                <button type="button" class="btn btn-danger">🗑️</button>
                <div class="modal bg-body fade" tabindex="-1" id="kt_modal_2">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content shadow-none">
                        <div class="modal-header" style="background-color: #0d47a1; color: white;"> <!-- Menggunakan warna custom -->
                                <h5 class="modal-title">SARANA PRASARANA</h5>
                            </div>

                            <div class="modal-body">
                                <div class="container mt-4">
                                    <h3>Mengedit Data Siswa</h3>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" v-model="siswa.nama" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <input type="text" class="form-control" v-model="siswa.status" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Masuk</label>
                                            <input type="date" class="form-control" v-model="siswa.tanggal_masuk" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Keluar</label>
                                            <input type="date" class="form-control" v-model="siswa.tanggal_keluar" />
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Perbaiki button simpan -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Data Siswa -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen"> <!-- Menggunakan modal-fullscreen untuk tampilan penuh -->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0d47a1; color: white;"> <!-- Menggunakan warna custom -->
                <h5 class="modal-title" id="addStudentModalLabel">Tambah Data Siswa</h5>
                
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('siswa.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\try\resources\views/admin/siswa/dashboard.blade.php ENDPATH**/ ?>