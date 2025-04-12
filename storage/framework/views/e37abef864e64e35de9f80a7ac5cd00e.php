
<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
      <h4>Data Master Produk</h4>
      <div class="mb-3">
      <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">Tambah</button>      </div>
      
      <div class="mb-3 d-flex justify-content-between">
        <div>
          <label>Show
            <select v-model="entries" class="form-select d-inline w-auto mx-2">
              <option>10</option>
              <option>25</option>
              <option>50</option>
            </select> entries</label>
        </div>
        <input type="text" v-model="search" class="form-control w-auto" placeholder="Search...">
      </div>
      
      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>id</th>
            <th>nama</th>
            <th>jabatan</th>
            <th>kontak</th>
            <th>email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in filteredData" :key="index">
            <td>1</td>
            <td>Bambang S.pd</td>
            <td>Guru</td>
            <td>08123456</td>
            <td>bambang@example.com</td>
            <td>
              <button class="btn btn-primary btn-sm me-1"  data-bs-toggle="modal" data-bs-target="#kt_modal_2">✏️</button>
              <button class="btn btn-danger btn-sm">🗑️</button>
              <div class="modal bg-body fade" tabindex="-1" id="kt_modal_2">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content shadow-none">
                    <div class="modal-header" style="background-color: #0d47a1; color: white;"> <!-- Menggunakan warna custom -->
                            <h5 class="modal-title">SARANA PRASARANA</h5>
                        </div>

                        <div class="modal-body">
                            <div class="container mt-4">
                                <h3>Mengedit Data Petugas</h3>
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" v-model="siswa.nama" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" v-model="siswa.status" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kontak</label>
                                        <input type="text" class="form-control" v-model="siswa.tanggal_masuk" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" v-model="siswa.tanggal_keluar" />
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
                        <label class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="status" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kontak</label>
                        <input type="text" class="form-control" name="tanggal_masuk" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="tanggal_keluar" />
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
  <style>
  .container {
    max-width: 900px;
  }
  </style>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\try\resources\views/admin/petugas/dashboard.blade.php ENDPATH**/ ?>