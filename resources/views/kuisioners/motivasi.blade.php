@extends('layouts.app')
@section('content')
    <form method="POST" action="/motivation">
        @csrf
        <div class="form-group">
            <label for="situation">Bagaimana Pembelajaran selama pandemi covid-19?</label>
            <input type="text" class="form-control" id="situation" name="situation" placeholder="Jawaban kamu..." value="{{ old('situations')? old('situations') : '' }}">
        </div>
        <div class="form-group">
            <label for="problems">Apa kendala terbesar dalam pembelajaran daring selama pandemi covid-19?</label>
            <input type="text" class="form-control" id="problems" placeholder="Jawaban kamu..." name="problems" value="{{ old('problems')? old('problems') : '' }}">
        </div>
        <div class="form-group">
            <label for="motivation">Apakah guru selalu memberi motivasi selama pembelajaran daring?</label>
            <input type="text" class="form-control" id="motivation" placeholder="Jawaban kamu..." name="motivation" value="{{ old('motivations')? old('motivations') : '' }}">
        </div>
        <div class="form-group">
            <label for="selfMotivation">Bagaimana Pembelajaran selama pandemi covid-19?</label>
            <input type="text" class="form-control" id="selfMotivation" placeholder="Jawaban kamu..." name="selfMotivation" value="{{ old('selfMotivation')? old('selfMotivation') : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">Selanjutnya</button>
    </form>
@endsection