@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data aspek {{ $aspect->aspect }}</div>
                <div class="card-body">
                    <form action="/aspect/{{ $aspect->id }}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="aspec">aspek</label>
                            <input type="text" id="aspect" class="form-control" name="aspect"
                                value="{{ old('aspect') ? old('aspect') : $aspect->aspect }}">
                        </div>
                        <div class="form-group">
                            <label for="strength_suggestion">Pesan untuk kelebihan pada aspek {{ $aspect->aspect }}</label>
                            <textarea class="form-control" id="strength_suggestion" rows="3" name="strength_suggestion">
                            {{ old('strength_suggestion') ? old('strength_suggestion') : $aspect->strength_suggestion }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="weak_suggestion">Pesan untuk kekurangan pada aspek {{ $aspect->aspect }}</label>
                            <textarea class="form-control" rows="3" name="weak_suggestion">
                            {{ old('weak_suggestion') ? old('weak_suggestion') : $aspect->weak_suggestion }}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-large btn-primary">Perbaharui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
