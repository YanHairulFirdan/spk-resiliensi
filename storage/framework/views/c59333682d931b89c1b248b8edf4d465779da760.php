<?php $__env->startSection('content'); ?>
    <div class="container mt--3">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <p>
                    Pada website tes resiliensi ini bertujuan untuk menentukan resiliensi siswa pada saat pandemi Covid-19
                    melalui pengembangan website tes resiliensi dengan model pendekatan ARCS motivation design untuk menilai
                    kesehatan mental siswa SMA Negeri 1 Kota Bima.
                </p>
                <div class="card">

                    <div class="card-header bg-primary text-align-center font-weight-bold text-center">
                        <h3 class="text-white">Penggunaan Website Tes Resiliensi</h3>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li class="list-group-items">
                                Website tes resiliensi dapat menunjukkan kesehatan mental siswa melalui tes resiliensi
                                sehingga sekolah bisa memperhatikan kegiatan pembelajaran pada pandemi Covid-19.
                            </li>
                            <li class="list-group-items">
                                Sekolah dapat memiliki program pembelajaran untuk meningkatkan kesehatan mental siswa
                                sehingga membuat siswa menjadi pribadi yang resiliens.
                            </li>
                            <li class="list-group-items">
                                Meningkatkan kompetensi SDM berupa peningkatan keterampilan dan pengetahuan guru terhadap
                                perkembangan teknologi pembelajaran.
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header bg-primary text-align-center font-weight-bold text-center">
                        <h3 class="text-white">
                            Tahapan dalam mengerjakan website tes resiliensi
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>
                            Pada tahapan pertama siswa menjawab pertanyaan seputar pembelajaran yang dilakukan selama
                            pandemi Covid-19 dengan pendekatan model motivasi ARCS. Pertanyaan tersebut dibuat berdasarkan 4
                            elemen dalam model motivasi ARCS yaitu perhatian, relevansi, kepercayaan, dan kepuasan, dari
                            elemen model tersebut dibuat 6 pertanyaan dengan memberikan penjelasan pada setiap jawabannya.
                        </p>
                        <p>
                            Pada tahapan kedua siswa menjawab pertanyaan berupa tes pilihan dari yang sangat setuju sampai
                            sangat tidak setuju. Pertanyaan tersebut merupakan pertanyaan resiliensi untuk siswa berdasarkan
                            7 aspek resiliensi dari Reivich dan Shatte (2002) yang terdiri dari regulasi emosi, pengendalian
                            impuls, optimis, self-efficacy, analisis kausal, empati, dan reaching out.
                        </p>
                        <p>
                            Pada tahapan ketiga siswa dapat mengetahui hasil dari tes sebelumnya dari regulasi emosi,
                            pengendalian impuls, optimis, self-efficacy, analisis kausal, empati, dan reaching out yang hal
                            tersebut ditentukan dari jawaban siswa. Hasil dari tes berupa angka yang menunjukkan resilien
                            dari siswa, apakah siswa tersebut resilien atau tidak. Jika hasilnya tinggi maka resilien siswa
                            tersebut tinggi begitu juga sebaliknya. Selain itu pada bagian hasil, ditampilkan saran serta
                            kegiatan yang dapat dilakukan untuk meningkatkan resiliens siswa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-light"><?php echo e(__('Login')); ?></div>
                    <div class="card-body">
                        <?php echo $__env->make('components.loginForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\spk-resiliensi\resources\views/auth/login.blade.php ENDPATH**/ ?>