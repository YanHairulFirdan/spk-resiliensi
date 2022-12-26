<?php $__env->startSection('content'); ?>
    <div class="content">
        
        <form method="POST" action="/motivation">
            <?php echo csrf_field(); ?>
            <div class="container">
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group my-5 col-md-8">
                            <label for="answear_<?php echo e($loop->iteration); ?>"><?php echo e($question->question); ?></label>
                            <textarea name="answear_<?php echo e($loop->iteration); ?>" class="form-control"
                                id="answear_<?php echo e($loop->iteration); ?>" placeholder="Jawaban kamu..."><?php echo e(old('answear_' . $loop->iteration) ? old('answear_' . $loop->iteration) : ''); ?></textarea>

                            <?php
                            $error = 'answear_' . $loop->iteration;
                            ?>
                            <?php if($errors->has($error)): ?>
                                <span class="invalid-feedback" role="alert"
                                    style="display: <?php echo e($errors->has($error) ? 'block' : 'none'); ?>">
                                    <strong><?php echo e($errors->first($error)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>


                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/kuisioners/motivasi.blade.php ENDPATH**/ ?>