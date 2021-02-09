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
                        <button type="submit" class="btn btn-large btn-primary">Perbaharui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
