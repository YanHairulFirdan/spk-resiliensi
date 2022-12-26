<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center text-primary"><b>Selamat <?php echo e(auth()->user()->name); ?>, kamu berhasil menyelesaikan
                        test
                        ini</b></h3>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="/img/images/congrats.jpg" alt="" srcset="" width="100%" height="100%" id="congrats">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="container">
                <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="font-weight-bold text-primary">
                                <label for="" class="font-weight-bold">
                                    <?php echo e($labelChart[$loop->index]); ?> :
                                </label>
                                <span class="score"></span>
                                <span>%</span>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <meter class="form-control meter" min="0" max="100"></meter>
                                </div>
                                <div class="col-2 icon">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php if(isset($labels)): ?>
        <div id="accordion">
            <div class="row my-4 justify-content-center">
                <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card col-12 col-md-10">
                        <div class="card-header bg-primary" id="<?php echo e($loop->index); ?>heading">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_<?php echo e($loop->index); ?>"
                                    aria-expanded="<?php echo e($loop->index <= 0 ? 'true' : 'false'); ?>"
                                    aria-controls="collapse_<?php echo e($loop->index); ?>">
                                    <h4 class="text-bold text-white">
                                        <?php echo e($label->aspect); ?>

                                    </h4>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse_<?php echo e($loop->index); ?>" class="collapse  <?php echo e($loop->index <= 0 ? 'show' : ''); ?>"
                            aria-labelledby="<?php echo e($loop->index); ?>heading" data-parent="#accordion">
                            <div class="card-body">
                                <div class="todos">
                                    <h5>Hal yang bisa kamu lakukan untuk meningkat kan aspek
                                        <strong><?php echo e($label->aspect); ?></strong>
                                    </h5>
                                    <?php $__currentLoopData = $label->tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tip->tipe === 'todo'): ?>
                                            <li class="list-group-item"><?php echo e($tip->tips); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="todos my-2">
                                    <h5>Selain itu kamu disarankan untuk melakukan hal-hal di bawah ini:</h5>
                                    <?php $__currentLoopData = $label->tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tip->tipe === 'suggestion'): ?>
                                            <li class="list-group-item"><?php echo e($tip->tips); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="my-2">
                                    <h5>Berikut link video atau artikel yang bisa kamu pelajari:</h5>
                                    <?php $__currentLoopData = $label->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><a href="<?php echo e($link->link); ?>"><?php echo e($link->judul); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
    </div>

    <script src="<?php echo e(URL::asset('admin/assets/plugins/charts/Chart.min.js')); ?>"></script>
    <script>
        // const ctx = document.getElementById('canvas');
        var data = <?php echo $scores; ?> ; // get scores
        var icons = <?php echo $icons; ?> ; // get icons
        var meters = Array.from(document.querySelectorAll(".meter"));

        var iconElements = document.querySelectorAll(".icon");
        var scores = document.querySelectorAll(".score");


        async function showMeter() {
            for (const [index, meter] of meters.entries()) {
                let resolveResult = await animateMeter(meter, index, data[index])
            }
        }


        function animateMeter(meterElement, index, meterValue) {
            let iconClass = '';

            return new Promise((resolve, reject) => {
                let interval = setInterval(() => {
                    meterElement.value += 1;
                    scores[index].innerText = meterElement.value;
                    meterValue -= 1;

                    if (meterValue <= 0) {
                        clearInterval(interval)
                        if (Number(meterElement.value) < 60) {
                            iconClass = icons['low']
                        } else if (Number(meterElement.value) >= 60 && Number(meterElement.value) < 80) {
                            iconClass = icons['good']
                        } else iconClass = icons['great'];
                        iconElements[index].insertAdjacentHTML('afterbegin',
                            `<i class="${iconClass}"></i>`
                        );
                        resolve("done");
                    }
                }, 70);

            })
        }

        showMeter()






        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: <?php echo $labelChart; ?> ,
        //         datasets: [{
        //             label: 'hasil test kamu',
        //             data: <?php echo $scores; ?> ,
        //             barThickness: 'flex',
        //             maxBarThickness: 6,
        //             borderWidth: 1,
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //         }]
        //     },
        //     options: {

        //         legend: {
        //             position: "bottom"
        //         },
        //         scales: {
        //             x: {
        //                 stacked: true
        //             },
        //             y: {
        //                 stacked: true
        //             },
        //             xAxes: [{
        //                 beginAtZero: true,
        //                 ticks: {
        //                     autoSkip: false
        //                 }
        //             }],
        //             yAxes: [{
        //                 display: true,
        //                 ticks: {
        //                     suggestedMin: 0
        //                 }
        //             }]
        //         }
        //     }
        // })

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/kuisioners/result.blade.php ENDPATH**/ ?>