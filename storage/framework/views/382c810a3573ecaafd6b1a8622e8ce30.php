

<?php $__env->startSection('content'); ?>
  <div class="container mt-4">
    <!-- Header -->
    <div class="card p-3" style="background: #837bf7; color: white;">
      <h5 class="m-0">Data Surat Arsip</h5>
    </div>

    <!-- Tombol Tambah -->
    <div class="mt-3">
      <router-link to="/tambah">
        <button class="btn btn-primary">Tambah</button>
      </router-link>
    </div>

    <!-- Tabel -->
    <div class="card mt-3 p-3">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Dokumen</th>
            <th>Nama Pengirim</th>
            <th>Nama Penerima</th>
            <th>Kategori Surat</th>
            <th>Tujuan Surat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <button class="btn btn-warning btn-sm me-1">✏️</button>
              <button class="btn btn-danger btn-sm">🗑️</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


<script>
export default {
  data() {
    return {
      suratList: [
        {
          tanggal: "2015-02-14",
          namaDokumen: "Surat Undangan Rapat Tahunan",
          namaPengirim: "Dinas Pendidikan",
          namaPenerima: "SMKN 4 Tasikmalaya",
          kategori: "Masuk",
          tujuan: "Undangan"
        }
      ]
    };
  }
};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\try\resources\views/admin/arsip/create.blade.php ENDPATH**/ ?>