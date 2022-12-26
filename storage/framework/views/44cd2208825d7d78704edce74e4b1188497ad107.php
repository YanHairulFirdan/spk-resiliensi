<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Data Guru</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mata pelajaran yang diampu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = ($teachers->currentpage() - 1) * $teachers->perpage() + 1;
                    ?>
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($i); ?></th>
                            <td><?php echo e($teacher->name); ?></td>
                            <td><?php echo e($teacher->username); ?></td>
                            <td><?php echo e($teacher->email); ?></td>
                            <td><?php echo e($teacher->nip); ?></td>
                            <td><?php echo e($teacher->class); ?></td>
                            <td><?php echo e($teacher->subject); ?></td>
                            <td>
                                <a href="/admin/teacher/<?php echo e($teacher->id); ?>/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/teacher/<?php echo e($teacher->id); ?>" style="display: inline" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($teachers->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/admin/teacher/index.blade.php ENDPATH**/ ?>