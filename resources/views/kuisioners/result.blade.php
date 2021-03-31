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
                <img src="/img/images/congrats.jpg" alt="" srcset="" width="100%" height="100%" id="congrats">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12" style="height: fit-content">
                <canvas id="canvas">
                </canvas>
            </div>
            <div class="container">
                @foreach ($scores as $score)
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div>
                                <label for="" class="font-weight-bold">
                                    {{ $labelChart[$loop->index] }} :
                                </label>
                                <span class="score"></span>
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
                @endforeach
            </div>
        </div>
    </div>

    @isset($labels)
        <div id="accordion">
            <div class="row my-4 justify-content-center">
                @foreach ($labels as $label)
                    <div class="card col-10">
                        <div class="card-header bg-primary" id="{{ $loop->index }}heading">
                            <h5 class="mb-0 ">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{ $loop->index }}"
                                    aria-expanded="{{ $loop->index <= 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse_{{ $loop->index }}">
                                    <h4 class="text-bold text-white">
                                        {{ $label->aspect }}
                                    </h4>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse_{{ $loop->index }}" class="collapse  {{ $loop->index <= 0 ? 'show' : '' }}"
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
                                    <h5>Selain itu kamu disarankan untuk melakukan hal-hal di bawah ini:</h5>
                                    @foreach ($label->tips as $tip)
                                        @if ($tip->tipe === 'suggestion')
                                            <li class="list-group-item">{{ $tip->tips }}</li>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="my-2">
                                    <h5>Berikut link video atau artikel yang bisa kamu pelajari:</h5>
                                    @foreach ($label->links as $link)
                                        <li class="list-group-item"><a href="{{ $link->link }}">{{ $link->judul }}</a>
                                        </li>
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
        var data = <?php echo $scores; ?> ; // get scores
        var icons = <?php echo $icons; ?> ; // get icons
        var meters = document.querySelectorAll(".meter");

        var iconElements = document.querySelectorAll(".icon");
        var scores = document.querySelectorAll(".score");

        meters.forEach((meter, index) => {
            let meterValue = data[index];
            let iconClass = ''
            console.log(`index outside setinterval = ${index}`);


            let setMeterValue = setInterval(() => {
                console.log(`index inside setinterval= ${index}`);
                meter.value += 10;
                scores[index].innerText = meter.value;
                meterValue -= 10;

                if (meterValue < 10 && meterValue !== 0) {
                    meter.value += meterValue;
                    scores[index].innerText = parseFloat(scores[index].innerText) + meterValue;
                    meterValue -= meterValue;
                }

                if (meterValue <= 0) {
                    clearInterval(setMeterValue);
                    if (Number(meter.value) < 60) {
                        iconClass = icons['low']
                    } else if (Number(meter.value) >= 60 && Number(meter.value) < 80) {
                        iconClass = icons['good']
                    } else iconClass = icons['great'];
                    iconElements[index].insertAdjacentHTML('afterbegin',
                        `<i class="${iconClass}"></i>`
                    )

                }
            }, 800)
        });






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
@endsection

@push('javascript')

@endpush
