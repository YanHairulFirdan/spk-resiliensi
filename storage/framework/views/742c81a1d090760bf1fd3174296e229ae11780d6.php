<?php $__env->startSection('content'); ?>
    <form action="/admin/question/import" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">

            <input type="file" class="form-control" placeholder="upload file excel" aria-label="Recipient's username"
                aria-describedby="basic-addon2" name="excel">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit">Upload</button>
            </div>
        </div>
        <?php $__errorArgs = ['excel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="alert alert-danger row" role="alert">
                <?php echo e($message); ?>

            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Kuisioner</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Pertanyaan kuisioner</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $quisioners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quisioner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->index + 1); ?></th>
                            <td><?php echo e($quisioner->question); ?></td>
                            <td>
                                <a href="/admin/quisioner/<?php echo e($quisioner->id); ?>/edit"
                                    class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/quisioner/<?php echo e($quisioner->id); ?>" style="display: inline"
                                    method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus pertanyaan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <button class="btn btn-primary btn-lg">Tambah Data</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/admin/quisioner/index.blade.php ENDPATH**/ ?>