@extends('layouts.app')
@section('content')

    <div class="content">
        <form method="POST" action="/kuisioner">
            @csrf
            {{-- {{ dd($options) }} --}}
            @foreach ($aspects as $aspect)
                <div id="form-group-{{ $loop->iteration }}" class="my-4 input-group ">

                    <div class="row justify-content-center">
                        @if (file_exists('img/images/' . $aspect->aspect . '.jpg'))
                            <div class="row d-flex justify-content-center">
                                {{-- <div class="col-md-8"> --}}
                                    <div class="rounded">
                                        <img src="img/images/{{ $aspect->aspect . '.jpg' }}" alt="" srcset=""
                                            class="img-fluid" height="564px" width="564px">
                                    </div>
                                    {{--
                                </div> --}}
                            </div>
                        @endif
                        @foreach ($aspect->statements as $statement)
                            <div class="card my-1 col-md-8">
                                <div class="card-header bg-primary" style="">
                                    <span class="text-white">
                                        {{ $statement->statement }}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        {{-- @if ($statement->type === 'positif') --}}
                                            @for ($i = 0; $i < 5; $i++)
                                                <div class="col-md-2 col-12">
                                                    <span class="form-radio">
                                                        <input type="radio"
                                                            name="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index }}"
                                                            id="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index . $i }}"
                                                            value="{{ $statement->type === 'positif' ? $skor['positif'][$i] : $skor['negatif'][$i] }}"
                                                            {{ $i == 2 ? 'checked' : '' }}>
                                                        <br>
                                                        <label
                                                            for="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index . $i }}">{{ $options[$i] }}</label>
                                                    </span>
                                                </div>
                                            @endfor
                                            {{-- @else --}}
                                            {{-- @for ($i = 4; $i >= 0; $i--)
                                                <div class="col-md-2 col-12">
                                                    <span class="form-radio">
                                                        <input type="radio"
                                                            name="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index }}"
                                                            id="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index . $i }}"
                                                            value="{{ $i + 1 }}" {{ $i == 0 ? 'checked' : '' }}>
                                                        <br>
                                                        <label
                                                            for="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index . $i }}">{{ $options[$i] }}</label>
                                                    </span>
                                                </div>
                                            @endfor
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
            var elementGroups = Array.from(document.getElementsByClassName('input-group'));
            console.log(typeof(elementGroups));
            elementGroups.forEach(element => {
                element.style.display = 'none'
            })
            document.getElementById('form-group-1').style.display = 'block';

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
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
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

        </script>
    @endpush
