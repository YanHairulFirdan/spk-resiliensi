@extends('layouts.app')
{{-- @include('components.formStepper') --}}
@section('content')
    <div class="container">

        <h3><b>Hai {{ auth()->user()->name }}, ini hasil test kamu</b></h3>
        <p>berdasarkan hasil test kamu telah memiliki beberapa karakter</p>
        <div class="row">
            <div class="col-md-10">
                <canvas id="canvas">
                </canvas>
            </div>
            @foreach ($labels as $label)
                {{-- {{ dd(gettype($label)) }} --}}
                <div class="row my-4 justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $label->aspect }}</h4>
                            </div>
                            <div class="card-body">
                                <h3>ini tips untuk kamu</h3>
                                @foreach ($label->tips as $tip)
                                    <p>{{ $tip->tips }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
