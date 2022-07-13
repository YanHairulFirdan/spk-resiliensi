@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <h3 class="font-weight-bold text-center">
                    Halo selamat datang di website kami
                </h3>
            </div>
        </div>
    </div>

    <div class="container-fluid intro w-100 mt-3 bg-primary text-white">
        <div class="container justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-10 py-5">
                    <h4 class="text-white font-weight-bold text-center">
                        Pengenalan Website
                    </h4>
                    <p class="introduction text-justify">
                        Resiliensi dalam pendidikan dikutip dari Media Indonesia (2019) resilience pendidikan berkaitan dengan tiga hal, salah satunya kemampuan sosioemosional dan keterlibatan peserta didik dalam pembelajaran yang berkaitan dengan sikap akademik yang positif, motivasi belajar dan berprestasi, merasa nyaman atau senang dalam kelas/proses belajar, kemampuan sosial dan komunikasi yang digunakan untuk membangun relasi efektif dengan teman sejawat dan senior. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid goals w-100 bg-primary text-white my-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 py-5">
                    <h4 class="text-white font-weight-bold text-center">
                        Apa itu resiliensi ? 
                    </h4>
                    <p class="introduction">
                        Resiliensi adalah keberhasilan individu dalam beradaptasi dengan kondisi yang tidak menyenangkan/buruk dalam mengatasi, melalui, dan kembali pada kondisi semula untuk mempertahankan stabilitas psikologis dalam menghadapi stres
                    </p>
                    <p>
                        Keseluruhan daya penggerak di dalam diri remaja yang tetap berusaha untuk tetap bertahan dalam pembelajaran selama pandemi Covid-19 menimbulkan adanya resiliensi dalam diri mereka sebagai siswa di sekolah. Mencontohkan sifat-sifat yang mencerminkan resiliensi seperti berfokus kepada hal-hal yang pasti dan menunjukan banyak alternatif dalam menyelesaikan suatu permasalahan dapat membantu anak mengembangkan resiliensi pelajar. Remaja sebagai pelajar yang dengan resiliensi tinggi dapat memikirkan berbagai alternatif untuk tetap menjaga keterampilan dan interaksi sosial nya agar tetap terasah.
                    </p>
                    <p>
                        Remaja dengan resiliensi tinggi akan beralih dari kecemasan yang diakibatkan oleh hal-hal yang tidak pasti. Mereka lebih memilih untuk memusatkan perhatian kepada aktivitas positif dan hal-hal yang dapat mereka kontrol.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 container">
                <iframe src="https://www.youtube.com//embed/jBCMmJ8eDrw?autoplay=1" frameborder="0" allowfullscreen
                    width="100%" height="400px"></iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center benefits">
            <div class="col-8">
                <div class="row">
                    <div class="col-md-6 col-12 order-md-2">
                        <img src="{{ asset('img/images/cuteanimated-43.jpg') }}" class="image-thumbnail" width="100%"
                            alt="">
                    </div>
                    <div class="col-md-6 col-12 mx-auto text-white bg-primary pt-5 order-md-1">
                        <h4 class="font-weight-bold text-center">
                            Bagi Guru
                        </h4>
                        <ol>
                            <li>
                                Memberikan pedoman kepada guru untuk lebih memperhatikan resiliensi siswa pada saat
                                pembelajaran di
                                tengah pandemi Covid-19.
                            </li>
                            <li>
                                Guru diharapkan lebih memperhatikan kesehatan mental siswa selama pandemi Covid-19
                            </li>
                            <li>
                                Media bagi guru untuk dapat memberikan pertanyaan dan pernyatan yang membuat siswa merasa
                                termotivasi.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-center benefits">
            <div class="col-8">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <img src="{{ asset('img/images/students.jpg') }}" class="image-thumbnail" width="100%"
                            alt="">
                    </div>
                    <div class="col-sm-6 col-12 bg-primary text-white pt-5">
                        <h4 class="font-weight-bold text-center">
                            Bagi Peserta Didik
                        </h4>
                        <ol>
                            <li>
                                Proses penilaian kesehatan mental siswa yang menjadi pengalaman menyenangkan sehingga siswa
                                dapat
                                mengembangkan resiliensi dengan baik.
                            </li>
                            <li>
                                Meningkatkan motivasi siswa ditengah pandemi Covid-19 karena proses pembelajaran menjadi
                                terhambat
                                sehingga mempengaruhi kesehatan mental siswa dalam kegiatan sekolah. </li>
                            <li>
                                Motivasi siswa menjadi pribadi yang resilien. </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{route('user.quiz.index')}}"></a>
        </div>
    </div>
@endsection
