@extends('layouts.app')
@section('content')
    <div class="content">
        <form method="POST" action="/motivation">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($questions as $question)
                        <div class="form-group my-5 col-md-8">
                            <label for="">{{ $question->question }}</label>
                            <textarea name="question_{{ $loop->index }}" class="form-control" id=""
                                placeholder="Jawaban kamu...">
                            {{ old('question_' . $loop->index) ? old('question_' . $loop->index) : '' }}
                            </textarea>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
@endsection
