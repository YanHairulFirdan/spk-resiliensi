@extends('layouts.app')
@section('content')
    <div class="content">
        {{-- @if (count($errors) > 1)
            {{ dd($errors) }}
        @endif --}}
        <form method="POST" action="/motivation">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($questions as $question)
                        <div class="form-group my-5 col-md-8">
                            <label for="answear_{{ $loop->iteration }}">{{ $question->question }}</label>
                            <textarea name="answear_{{ $loop->iteration }}" class="form-control"
                                id="answear_{{ $loop->iteration }}" placeholder="Jawaban kamu...">
                            {{ old('answear_' . $loop->iteration) ? old('answear_' . $loop->iteration) : '' }}
                            </textarea>

                            @php
                            $error = 'answear_' . $loop->iteration;
                            @endphp
                            @if ($errors->has($error))
                                <span class="invalid-feedback" role="alert"
                                    style="display: {{ $errors->has($error) ? 'block' : 'none' }}">
                                    <strong>{{ $errors->first($error) }}</strong>
                                </span>
                            @endif
                        </div>


                        {{-- {{ dd('answear_' . $loop->iteration) }}
                        --}}
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
@endsection
