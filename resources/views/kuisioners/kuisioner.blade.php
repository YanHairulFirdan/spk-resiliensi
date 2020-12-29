@extends('layouts.app')
@section('content')

    <div class="content">
        <form method="POST" action="/kuisioner">
            @csrf
            @foreach ($aspects as $aspect)
                <div id="form-group-{{ $loop->index + 1 }}" class="my-4 input-group">

                    @foreach ($aspect->statements as $statement)
                        <div class="card my-1">
                            <div class="card-header">
                                {{ $statement->statement }}
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="col-md-3 col-3 d-flex justify-content-center">
                                            <span class="form-radio text-center">
                                                <input type="radio"
                                                    name="{{ $aspectsArr[$loop->parent->index].'_'.$statement->type . '_' . $loop->index }}"
                                                    id="{{ $aspectsArr[$loop->parent->index] .'_'.$statement->type . '_' . $loop->index }}"
                                                    value="{{ $i + 1 }}" {{ $i == 0 ? 'checked' : '' }}>
                                                <br>
                                                <label for="">{{ $i + 1 }}</label>
                                            </span>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button class="btn btn-success btn-sm btn-large mx-4" id="submit" style="dis" type="submit">simpan</button>
        </form>

        <div class="button-group d-flex justify-content-center">
            <button class="btn border-primary btn-sm btn-large mx-4" id="previous" onclick="previousForm()"><a
                    href="/motivation">sebelumnya</a></button>
            <button class="btn btn-primary btn-sm btn-large mx-4" id="next" onclick="nextForm()">selanjutnya</button>
        </div>
    @endsection


    @push('javascript')
        <script>
            const previousButton = document.getElementById('previous');
            const btnNext = document.getElementById('next');
            const submit = document.getElementById('submit');
            // previousButton.style.display = 'none';
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
                    previousButton.innerText = 'sebelumnya';
                    if (counter > 6) {
                        console.log(counter);
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
