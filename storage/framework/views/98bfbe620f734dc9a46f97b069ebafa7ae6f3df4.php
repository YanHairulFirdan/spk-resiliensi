<?php $__env->startSection('content'); ?>
    <div class="form">
        <form action="/admin/statement/import" method="post" enctype="multipart/form-data">
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
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Pernyataan</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">pernyataan</th>
                        <th scope="col">aspek</th>
                        <th scope="col">tipe</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->index + 1); ?></th>
                            <td><?php echo e($statement->statement); ?></td>
                            <td><?php echo e(optional($statement->aspect)->aspect); ?></td>
                            <td><?php echo e($statement->type); ?></td>
                            <td>
                                <a href="/admin/statement/<?php echo e($statement->id); ?>/edit"
                                    class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/statement/<?php echo e($statement->id); ?>" style="display: inline"
                                    method="post">
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
            
            <div class="my-2">
                <button class="btn btn-large btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah data</button>
            </div>
        </div>
    </div>

    <div class="modal" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan data baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/statement">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="aspect_id">kategori aspek</label>
                            <select name="aspect_id" id="aspect_id" class="form-control">
                                <?php $__currentLoopData = $aspects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($aspect->id); ?>">
                                        <?php echo e($aspect->aspect); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['aspect_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="statement">Pernyataan</label>
                            <textarea class="form-control" id="statement" rows="2" name="statement">
                                <?php echo e(old('statement') ? old('statement') : ''); ?>

                                </textarea>
                        </div>
                        <?php $__errorArgs = ['statement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <button type="submit" class="btn btn-large btn-primary">Tambah data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/admin/statement/index.blade.php ENDPATH**/ ?>