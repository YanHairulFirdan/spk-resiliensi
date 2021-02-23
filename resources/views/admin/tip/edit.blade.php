@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data pernyataan</div>
                <div class="card-body">
                    <form action="/admin/tip/{{ $tip->id }}" class="form" method="POST">
                        @csrf
                        @if ($errors->has('any'))
                            {{ dd($errors) }}
                        @endif
                        @method('PUT')
                        <div class="form-group">
                            <label for="aspect_id">kategori aspek</label>
                            <select name="aspect_id" id="aspect_id" class="form-control">
                                @foreach ($aspects as $aspect)
                                    <option value="{{ $aspect->id }}"
                                        {{ $aspect->id == $tip->aspect_id ? 'selected' : '' }}>
                                        {{ $aspect->aspect }}
                                    </option>
                                @endforeach
                            </select>
                            @error('aspect_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="statement">Tips</label>
                            <textarea class="form-control" id="tips" rows="3"
                                name="tips">{{ old('tips') ? old('tips') : $tip->tips }}</textarea>
                        </div>
                        @error('tips')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-large btn-primary">Perbaharui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
