@extends('layouts.app')
@section('content')

    <div class="content">
        <form method="POST" action="/kuisioner">
            @csrf
            {{-- {{ dd($options) }} --}}
            @foreach ($aspects as $aspect)
                <div id="form-group-{{ $loop->iteration }}" class="my-4 input-group" class="form-wrapper"
                    data-length="{{ $aspect->statements_count }}" data-aspect="{{ $aspect->aspect }}">

                    <div class="row justify-content-center">
                        <div class="container" style="width: fit-content">
                            <div class="row d-flex justify-content-center">
                                <div class="rounded col-md-6">
                                    <img src="{{ $aspect->getImagePath() }}" alt="" srcset=""
                                        class="img-fluid" height="564px" width="564px">
                                    <div class="text-center">
                                        <span
                                            style="text-align: center !important; font-size: small; font-style: italic"
                                            class="font-weight-bold text-italic">"{{ $aspect->quote }}"</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($aspect->statements as $statement)
                            <div class="card my-1 col-md-8 px-0">
                                <div class="card-header bg-primary" style="">
                                    <span class="text-white">
                                        {{ $loop->iteration . '. ' . $statement->statement }}
                                    </span>
                                </div>
                                <div class="card-body px-0">
                                    <div class="row d-flex justify-content-center">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div class="col-md-2 col-12">
                                                <div class="form-check">


                                                    <input type="radio" class="form-check-input"
                                                        name="{{ $aspect->aspect. '['. $loop->index .']' }}"
                                                        id="{{ $aspect->aspect. '_' . $loop->index .'_'.$i}}"
                                                        value="{{ $statement->type == 'positif' ? $skor['positif'][$i] : $skor['negatif'][$i] }}"
                                                        data-aspectname="{{ $aspect->aspect }}"
                                                        onclick="handleSelectingOption()">



                                                    <label class="form-check-label"
                                                        for="{{ $aspect->aspect. '_' . $loop->index .'_'.$i}}">{{ $options[$i] }}</label>

                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
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
        @php
            
        @endphp
    @endsection


    @push('javascript')
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
    @endpush
