@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data pernyataan</div>
                <div class="card-body">
                    <form action="/admin/link" class="form" method="POST">
                        @csrf
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
                            <label for="link">links</label>
                            <input class="form-control" id="link" rows="2" name="link"
                                value="{{ old('link') ? old('link') : $link->link }}">
                        </div>
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input class="form-control" id="judul" rows="3" name="judul"
                                value="{{ old('judul') ? old('judul') : $link->judul }}">

                        </div>
                        @error('judul')
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
