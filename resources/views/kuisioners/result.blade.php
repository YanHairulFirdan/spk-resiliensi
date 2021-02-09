@extends('layouts.app')
{{-- @include('components.formStepper') --}}
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center text-primary"><b>Selamat {{ auth()->user()->name }}, kamu berhasil menyelesaikan
                        test
                        ini</b></h3>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="/img/images/congrats.jpg" alt="" srcset="" width="100%" height="100%">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <canvas id="canvas">
                </canvas>
            </div>
            @isset($labels)
                <div id="accordion">
                    <div class="row my-4 justify-content-center">
                        @foreach ($labels as $label)
                            <div class="card col-10">
                                <div class="card-header bg-primary" id="{{ $loop->index }}heading">
                                    <h5 class="mb-0 ">
                                        <button class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapse_{{ $loop->index }}"
                                            aria-expanded="{{ $loop->index <= 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse_{{ $loop->index }}">
                                            <h4 class="text-bold text-white">
                                                {{ $label->aspect }}
                                            </h4>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse_{{ $loop->index }}"
                                    class="collapse  {{ $loop->index <= 0 ? 'show' : '' }}"
                                    aria-labelledby="{{ $loop->index }}heading" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="todos">
                                            <h5>Hal yang bisa kamu lakukan untuk meningkat kan aspek
                                                <strong>{{ $label->aspect }}</strong>
                                            </h5>
                                            @foreach ($label->tips as $tip)
                                                @if ($tip->tipe === 'todo')
                                                    <li class="list-group-item">{{ $tip->tips }}</li>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="todos my-2">
                                            <h5>selain itu kamu disarankan untuk melakukan hal-hal di bawah ini:</h5>
                                            @foreach ($label->tips as $tip)
                                                @if ($tip->tipe === 'suggestion')
                                                    <li class="list-group-item">{{ $tip->tips }}</li>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="my-2">
                                            <h5>berikut link video atau artikel yang bisa kamu pelajari:</h5>
                                            @foreach ($label->links as $link)
                                                <li class="list-group-item"><a
                                                        href="{{ $link->links }}">{{ $link->judul }}</a></li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endisset
        </div>
    </div>

    <script src="{{ URL::asset('admin/assets/plugins/charts/Chart.min.js') }}"></script>
    <script>
        const ctx = document.getElementById('canvas');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: <?php echo $labelChart; ?> ,
                datasets: [{
                    label: 'hasil test kamu',
                    data: <?php echo $scores; ?> ,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            }
        })

    </script>
@endsection

@push('javascript')

@endpush
