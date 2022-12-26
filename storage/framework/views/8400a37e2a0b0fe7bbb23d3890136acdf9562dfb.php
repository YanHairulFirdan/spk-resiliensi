<?php $__env->startSection('content'); ?>

    <div class="content">
        <form method="POST" action="/kuisioner">
            <?php echo csrf_field(); ?>
            
            <?php $__currentLoopData = $aspects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aspect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="form-group-<?php echo e($loop->iteration); ?>" class="my-4 input-group" class="form-wrapper"
                    data-length="<?php echo e($aspect->statements()->count()); ?>" data-aspect="<?php echo e($aspect->aspect); ?>">

                    <div class="row justify-content-center">
                        <?php if(file_exists('img/images/' . $aspect->aspect . '.jpg')): ?>
                            <div class="container" style="width: fit-content">
                                <div class="row d-flex justify-content-center">
                                    <div class="rounded col-md-6">
                                        <img src="img/images/<?php echo e($aspect->aspect . '.jpg'); ?>" alt="" srcset=""
                                            class="img-fluid" height="564px" width="564px">
                                        <div class="text-center">
                                            <span
                                                style="text-align: center !important; font-size: small; font-style: italic"
                                                class="font-weight-bold text-italic">"<?php echo e($aspect->quote); ?>"</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $aspect->statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card my-1 col-md-8 px-0">
                                <div class="card-header bg-primary" style="">
                                    <span class="text-white">
                                        <?php echo e($statement->statement); ?>

                                    </span>
                                </div>
                                <div class="card-body px-0">
                                    <div class="row d-flex justify-content-center">
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <div class="col-md-2 col-12">
                                                <div class="form-check">


                                                    <input type="radio" class="form-check-input"
                                                        name="<?php echo e($aspectsArr[$loop->parent->index] . '_' . $loop->index); ?>"
                                                        id="<?php echo e($aspectsArr[$loop->parent->index] . '_' . $loop->index . $i); ?>"
                                                        value="<?php echo e($statement->type == 'positif' ? $skor['positif'][$i] : $skor['negatif'][$i]); ?>"
                                                        data-aspectname="<?php echo e($aspect->aspect); ?>"
                                                        onclick="handleSelectingOption()">



                                                    <label class="form-check-label"
                                                        for="<?php echo e($aspectsArr[$loop->parent->index] . '_' . $loop->index . $i); ?>"><?php echo e($options[$i]); ?></label>

                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="container mb-3">
                <div class="row d-flex justify-content-center">
                    <button class="btn btn-success btn-lg" id="submit" type="submit">simpan</button>
                </div>
            </div>
        </form>

        <div class="button-group d-flex justify-content-center">
            <button type="button" class="btn border-primary btn-lg mx-4" id="previous" onclick="previousForm()"><a
                    href="/motivation">sebelumnya</a></button>
            <button type="button" class="btn btn-primary btn-lg mx-4" id="next" disabled
                onclick="nextForm()">selanjutnya</button>
        </div>
        <?php
            
        ?>
    <?php $__env->stopSection(); ?>


    <?php $__env->startPush('javascript'); ?>
        <script>
            const init = () => {
                // get all of form group
                const submit = document.getElementById('submit');
                submit.style.display = 'none';
                var elementGroups = Array.from(document.getElementsByClassName('input-group'));
                // set form group display none
                elementGroups.forEach((element, index) => {
                    element.style.display = (index == 0) ? 'block' : 'none';
                })
            }

            init();
            // set form group 1 display block

            // global variables

            const previousButton = document.getElementById('previous');
            const btnNext = document.getElementById('next');
            var counter = 1;
            // end of global variables


            // previousButton.style.display = 'none';

            // global variable for counting form
            // function for move next form
            function nextForm() {
                counter++;
                toggleDisplayButton(counter);
                showForm(counter);
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                // btnNext.disabled = true;

            }
            // function for move previous form
            function previousForm() {
                counter--;
                toggleDisplayButton(counter);
                showForm(counter);
                // handleSelectingOption()
            }

            // change button to link if form group is the first one
            function toggleDisplayButton(counter) {
                const submit = document.getElementById('submit');
                if (counter > 1) {
                    previousButton.innerText = 'sebelumnya';
                    if (counter > 6) {
                        btnNext.style.display = 'none';
                        submit.style.display = 'inline';
                    } else {
                        btnNext.style.display = 'inline';
                        submit.style.display = 'none';
                    }
                } else {
                    previousButton.innerHTML = '<a href = "/motivation">sebelumnya</a>';
                }
            }


            // function for showing form
            function showForm(counter) {
                var inputElement = Array.from(document.getElementsByClassName("input-group"));
                inputElement.forEach(input => {
                    input.style.display = 'none';
                })
                var showform = document.getElementById("form-group-" + counter)
                showform.style.display = 'block';
                handleSelectingOption();
            }

            const handleSelectingOption = () => {
                let elementWrappers = Array.from(document.getElementsByClassName('input-group'));
                let currentForm = elementWrappers.find(element => {
                    return element.style.display == 'block'
                });

                let formLength = parseInt(currentForm.dataset.length);

                let currentAspect = currentForm.dataset.aspect;
                let inputs = Array.from(document.querySelectorAll(`[data-aspectname='${currentAspect}']`));
                let inputLength = inputs.length;
                let uncheckedInput = inputs.filter(input => input.checked == false);
                if (currentForm.id == 'form-group-7') {
                    const submit = document.getElementById('submit');
                    submit.disabled = (inputLength - uncheckedInput.length === formLength) ? false : true;
                }
                btnNext.disabled = (inputLength - uncheckedInput.length === formLength) ? false : true;
            }

        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/kuisioners/kuisioner.blade.php ENDPATH**/ ?>