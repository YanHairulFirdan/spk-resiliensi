@extends('layouts.app')
@section('content')

    <div class="content">
        <form method="POST" action="/kuisioner">
            <div class="d-flex justify-content-center">
                <div class="stepperm">
                    <span class="stepper-point"></span>
                    <span class="nav-label">motivasi</span>
                    <span class="stepper-point"></span>
                    <span class="nav-label">resiliensi</span>
                    <span class="stepper-point"></span>
                    <span class="nav-label">hasil</span>
                </div>
            </div>
            @csrf

            @foreach ($aspects as $aspect)
                <div id="form-group-{{ $loop->index + 1 }}" class="my-4 input-group">
                    {{ $aspect->aspect }}
                    @foreach ($aspect->statements as $statement)
                        <div class="card my-1">
                            <div class="card-header">
                                {{ $statement->statement }}
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="form-radio mx-4">
                                        <input type="radio" name="{{ $aspect->aspect . '-' . $loop->index }}"
                                            id="{{ $aspect->aspect . '-' . $loop->index }}" value="{{ $i }}"
                                            {{ $i == 0 ? 'checked' : '' }}>
                                        <br>
                                        <label for="">{{ $i + 1 }}</label>
                                    </span>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </form>

        <div class="button-group d-flex justify-content-center">
            <button class="btn border-primary btn-sm btn-large m-2" id="previous"
                onclick="previousForm()">sebelumnya</button>
            <button class="btn btn-primary btn-sm btn-large m-2" id="next" onclick="nextForm()">selanjutnya</button>
            <button class="btn btn-success btn-sm btn-large m-2" id="submit" style="dis" type="submit">simpan</button>
        </div>
    @endsection


    @push('javascript')
        <script>
            const previousButton = document.getElementById('previous');
            const btnNext = document.getElementById('next');
            const submit = document.getElementById('submit');
            previousButton.style.display = 'none';
            submit.style.display = 'none';


            var counter = 1;

            function nextForm() {
                counter++;
                toggleDisplayButton(counter);
                showForm(counter);
                console.log('next');
                console.log(typeof(counter));
                console.log('form ke-' + counter);
            }

            function previousForm() {
                counter--;
                toggleDisplayButton(counter);
                console.log(typeof(counter));
                showForm(counter);
                console.log('form ke-' + counter);
                console.log('previous');
            }

            function toggleDisplayButton(counter) {
                if (counter > 1) {
                    previousButton.style.display = 'inline';
                    if (counter > 6) {
                        console.log(counter);
                        btnNext.style.display = 'none';
                        submit.style.display = 'inline';
                    } else {
                        btnNext.style.display = 'inline';
                        submit.style.display = 'none';
                    }
                } else {
                    previousButton.style.display = 'none';
                }
            }

            function showForm(counter) {
                var inputElement = Array.from(document.getElementsByClassName("input-group"));
                inputElement.forEach(input => {
                    input.style.display = 'none';
                })
                var showform = document.getElementById("form-group-" + counter)
                showform.style.display = 'block'
            }

            /*
                function for check whether  all of input were select?
                get the input from current section
                looping each input and check for if there any input section does not have check/select
                if all input section has been selected show button submit
            */

            function activate(counter) {
                let inputGroup = Array.from(document.querySelectorAll('form-group-' + counter + 'input[radio]'));
                inputGroup.filter(input => input.checked == 'false')
            }

        </script>
    @endpush
