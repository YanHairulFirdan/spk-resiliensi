<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Aspek</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">no.</th>
                        <th scope="col" class="text-center">aspek</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $aspects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row" class="text-center"><?php echo e($loop->index + 1); ?></th>
                            <td class="text-center"><?php echo e($aspect->aspect); ?></td>
                            <td class="text-center">
                                <a href="/admin/aspect/<?php echo e($aspect->id); ?>/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/aspect/<?php echo e($aspect->id); ?>" style="display: inline" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus aspek <?php echo e($aspect->aspect); ?>?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/admin/aspect/index.blade.php ENDPATH**/ ?>