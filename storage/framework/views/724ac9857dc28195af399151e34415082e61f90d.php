<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Data Siswa</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nomor telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = ($students->currentpage() - 1) * $students->perpage() + 1;
                    ?>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($i); ?></th>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->username); ?></td>
                            <td><?php echo e($student->class); ?></td>
                            <td><?php echo e($student->phoneNumber); ?></td>
                            <td>
                                <a href="/admin/user/<?php echo e($student->id); ?>/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/student/<?php echo e($student->id); ?>" style="display: inline" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                            
                            
                        </tr>
                        <?php
                            $i++;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($students->links()); ?>

        </div>
        <div class="d-flex justify-content-end m-2">
            <a href="/admin/student/download" class="btn btn-primary">Unduh data siswa</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/admin/student/index.blade.php ENDPATH**/ ?>