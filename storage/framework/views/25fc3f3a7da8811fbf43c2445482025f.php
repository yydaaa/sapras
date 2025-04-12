
<?php $__env->startSection('content'); ?>
<div class="container">
        <h1 class="my-4">Manajemen Akun</h1>
            <!-- Form Pencarian -->
            <form action="<?php echo e(route('akun.index')); ?>" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="<?php echo e(request('search')); ?>" style="margin-right: 10px;">
                    <a href="<?php echo e(route('akun.create')); ?>" class="btn text-white px-3" style="background-color: #77a35d; border-radius: 5px;">Tambah Akun</a>
                </div>
            </form>

    <!-- Tabel Akun -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $akuns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($akun->name); ?></td>
                <td><?php echo e($akun->email); ?></td>
                <td><?php echo e($akun->role); ?></td>
                <td>
                <!-- Tombol Edit -->
                <a href="<?php echo e(route('akun.edit', $akun->id)); ?>" class="btn btn-sm btn-outline-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-<?php echo e($akun->id); ?>">
                    <i class="bi bi-trash"></i>
                </button>
                </td>
            </tr>
            <div class="modal fade" id="confirmDeleteModal-<?php echo e($akun->id); ?>" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus akun ini dengan nama <?php echo e($akun->name); ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="<?php echo e(route('akun.destroy', $akun->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\try\resources\views/admin/akun/dashboard.blade.php ENDPATH**/ ?>