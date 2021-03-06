@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
        <div class="container-fluid">
            <div class="container d-flex justify-content-center alert alert-danger">
                <span>upps, you got some errors</span>
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        </div>
    @endif
    <div class="content">
        <div class="justify-content-center align-items-center">
            <h3 class="font-weight-bold text-center text-primary">
                Halo, selamat datang di website kami.
            </h3>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-12 my-2">
                    <img src="/img/images/guess.jpg" class="image-thumbnail" width="100%" alt="">
                </div>
                <div class="col-md-1 col-12 my-2"></div>
                <div class="col-md-5 col-12 my-2 d-flex align-items-center">
                    <div class="wrapper-content">
                        <h4 class="font-weight-bold text-primary">
                            Apa itu resilience?
                        </h4>
                        <p class="text-primary">
                            Resiliensi adalah keberhasilan individu dalam beradaptasi dengan kondisi yang tidak menyenangkan
                            / buruk dalam mengatasi, melalui, dan kembali pada kondisi semula untuk mempertahankan
                            stabilitas psikologis dalam menghadapi stres.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-12">
                    <h4 class="text-center font-weight-bold text-primary">
                        Apa saja aspek resilience?
                    </h4>
                    <div id="accordion">
                        @foreach ($aspects as $aspect)
                            <div class="card">
                                <div class="card-header bg-primary" id="heading{{ $loop->index }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapse{{ $loop->index }}"
                                            aria-expanded="{{ $loop->index <= 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $loop->index }}">
                                            <h5 class="font-weight-bold text-white">
                                                {{ $aspect->aspect }}
                                            </h5>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $loop->index }}"
                                    class="collapse {{ $loop->index <= 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $loop->index }}" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $aspect->descriptions }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 col-12 my-2 order-md-3">
                    <img src="/img/images/think.jpg" class="image-thumbnail" width="100%" alt="">
                </div>
                <div class="col-md-1 col-12 my-2"></div>
                <div class="col-md-5 col-12 d-flex align-items-center order-md-1">
                    <div class="wrapper-content" style="height: fit-content; margin: auto">
                        <h4 class="font-weight-bold text-primary text-center my-4">
                            Faktor-faktor yang Mempengaruhi Resiliensi
                        </h4>
                        <ol class="text-primary list-group list-group-flush"
                            style="padding: 0; height: fit-content; margin: ">
                            <li class="list-group-item">Hubungan yang positif dengan orang lain</li>
                            <li class="list-group-item">Self efficacy (keyakinan individu terhadap dirinya)</li>
                            <li class="list-group-item">Reintegrasi</li>
                            <li class="list-group-item">Pandangan positif mengenai kehidupan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid w-100 my-1 top-info">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 my-3">
                        <div class="card text-primary background-color-white">
                            <div class="card-header text-center border-bottom-color-primary">
                                <h4 class="text-responsive">
                                    Problematika Apa Saja Yang Dialami Oleh Remaja?
                                </h4>
                            </div>
                            <div class="card-body">
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item">Perubahan proporsi tubuh</li>
                                    <li class="list-group-item">Perubahan tubuh</li>
                                    <li class="list-group-item">Ketidakstabilan emosi</li>
                                    <li class="list-group-item">Problem hari depan </li>
                                    <li class="list-group-item">Problem sosial</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="card text-primary background-color-white">
                            <div class="card-header text-center border-bottom-color-primary">
                                <h4 class="text-responsive">Bagaimana Kondisi Kehidupan Remaja</h4>
                            </div>
                            <div class="card-body">
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Kecenderungan untuk meniru
                                    </li>
                                    <li class="list-group-item">
                                        Kecenderungan untuk mencari perhatian
                                    </li>
                                    <li class="list-group-item">
                                        Kecenderungan mulai tertarik pada lawan jenisnya
                                    </li>
                                    <li class="list-group-item">
                                        Kecenderungan mencari idola
                                    </li>
                                    <li class="list-group-item">
                                        Kecenderungan berfikir kritis
                                    </li>
                                    <li class="list-group-item">
                                        Emosinya selalu menggelora
                                    </li>
                                    <li class="list-group-item">
                                        Kegelisahan
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card text-primary">
                            <div class="card-header text-center">
                                <h3>Model Motivasi ARCS</h3>
                            </div>
                            <div class="card-body">
                                <p>Model Motivasi ARCS (Keller, 1987) merupakan keadaan internal yang mendefinisikan apa
                                    yang orang akan lakukan, bukan apa yang bisa mereka lakukan. Aspek-aspek model motivasi
                                    ARCS antara lain:
                                </p>
                                <ol class="list-group list-group-flush">
                                    <li class="list-group-item">Attention (perhatian)</li>
                                    <li class="list-group-item">Relevance (kegunaan)</li>
                                    <li class="list-group-item">Confidence (percaya diri)</li>
                                    <li class="list-group-item">Satisfaction (kepuasan) </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <h3 class="text-primary text-center font-weight-bold">
                        Kesehatan Mental Remaja
                    </h3>
                    <img src="/img/images/stress3-1.jpg" width="80%" alt="" class="image-responsive container">
                </div>
            </div>
        </div>
        <div class="container-fluid text-white footer-info">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="row">
                            <div class="col-md-12 text-white">
                                <h4 class="text-center font-weight-bold">
                                    Apa itu kesehatan mental remaja?
                                </h4>
                                <p>
                                    Kesadaran atas pentingnya kesehatan mental saat ini selalu ditanamkan oleh WHO. WHO
                                    Child and
                                    Adolescent Mental Health Atlas merupakan salah satu upaya sistematis pertama untuk
                                    mengumpulkan
                                    data
                                    dan mendokumentasikan secara objektif layanan global dan pelatihan yang tersedia di
                                    seluruh
                                    dunia
                                    untuk kesehatan mental anak dan remaja (WHO, 2001c).
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 my-3">
                                <div class="card text-primary border-bottom-color-primary background-color-white">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-bold">Kenapa kesehatan mental remaja itu penting?
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <p>menurut arnett (dalam rice & dolgin, 2007), pada masa remaja individu cenderung
                                            fokus
                                            untuk
                                            mendapatkan kebebasan emosional dari orangtua dan mengambil tanggung jawab dari
                                            tindakan
                                            mereka sendiri. remaja mulai menginginkan adanya kebebasan dan otonomi yang oleh
                                            sebagian
                                            orangtua dianggap sebagai sebuah pemberontakan. ketidakstabilan emosi yang
                                            dihadapi oleh
                                            remaja dapat menimbulkan permasalahan pada masa remaja (gunarsa & gunarsa,
                                            2008).
                                            memahami
                                            kesehatan mental pada anak dan remaja artinya perlu memahami juga faktor-faktor
                                            apa saja
                                            yang dapat membahayakan kesehatan mental (risk factor) dan faktor-faktor apa
                                            saja yang
                                            dapat
                                            melindungi kesehatan mental (protective factor) anak. risk factor menimbulkan
                                            kemungkinan
                                            kerentanan dalam diri anak, sedangkan protective factor menimbulkan kemungkinan
                                            kekuatan
                                            dalam diri anak.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 my-3">
                                <div class="card text-primary border-bottom-color-primary background-color-white">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-bold">Faktor-faktor Kesehatan Mental</h3>
                                    </div>
                                    <div class="card-body">
                                        <ol class="list-group list-group-flush">
                                            <li class="list-group-item">Kondisi dan konstitusi fisik
                                            </li>
                                            <li class="list-group-item">
                                                Kematangan taraf pertumbuhan dan perkembangan
                                            </li>
                                            <li class="list-group-item">
                                                Determinan (Pengalaman individu)
                                            </li>
                                            <li class="list-group-item">
                                                Kondisi lingkungan dan alam sekitar
                                            </li>
                                            <li class="list-group-item">
                                                Adat istiadat
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <p class="text-primary text-center">
        yuk cari tahu tingkat resiliensi kamu
    </p>
    <div class="d-flex justify-content-center my-4">
        <br>
        <button class="btn btn-lg btn-primary">
            @if (!Auth::user())
                <span data-button="auth" onclick="authForm" data-toggle="modal" data-target="#exampleModal">
                    Mulai tes
                </span>
            @else
                <a href="/motivation" class="text-light">Mulai tes</a>
            @endif
        </button>
    </div>
    </div>
    {{-- start login form --}}
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Silhakan Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.loginForm')

                    <div class="container d-flex justify-content-end">
                        <span class="text-primary text-small mx-1" data-toggle="modal" onclick="toggleForm('login')">daftar
                            disini</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end login form --}}
    {{-- start register form --}}
    <div class="modal" id="register" tabindex="-1" aria-labelledby="register">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar dulu yuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('components.registerForm')
                </div>
            </div>
        </div>
    </div>
    {{-- end register form --}}
@endsection

@push('javascript')
    <script type="text/javascript">
        function toggleForm(openedModal) {
            if (openedModal == 'login') {
                $('#exampleModal').modal('hide');
                $('#register').modal('show');
            } else {
                $('#register').modal('hide');
                $('#exampleModal').modal('show')
            }
        }

    </script>
@endpush
