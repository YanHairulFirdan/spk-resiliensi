@extends('layouts.app')
@section('content')

    <div class="content">
        <form method="POST" action="/kuisioner">
            @csrf
            {{-- {{ dd($aspects) }} --}}
            @foreach ($aspects as $aspect)
                <div id="form-group-{{ $loop->iteration }}" class="my-4 input-group d-flex justify-content-center">
                    @if (file_exists('img/images/' . $aspect->aspect . '.jpg'))
                        <div class="row d-flex justify-content-center">
                            {{-- <div class="col-md-8"> --}}
                                <div class="rounded">
                                    <img src="img/images/{{ $aspect->aspect . '.jpg' }}" alt="" srcset="" class="img-fluid"
                                        height="564px" width="564px">
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
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="col-md-2 col-2 d-flex justify-content-center">
                                            <span class="form-radio text-center">
                                                <input type="radio"
                                                    name="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index }}"
                                                    id="{{ $aspectsArr[$loop->parent->index] . '_' . $loop->index }}"
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
            <button class="btn btn-primary btn-sm btn-large mx-4" id="next" onclick="test()">test</button>
        </div>
        <script>
            /*
                                                        function for check whether  all of input were selected?
                                                        get the input from current section
                                                        looping each input and check for if there any input section does not have check/select
                                                        if all input section has been selected show button submit
                                                    */
            function test() {
                document.getElementById('form-group-1').style.display = 'none';
                console.log('ok');
            }

        </script>
    @endsection


    @push('javascript')

    @endpush
