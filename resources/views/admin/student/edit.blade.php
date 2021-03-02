@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data pernyataan</div>
                <div class="card-body">
                    <form action="/admin/user/{{ $user->id }}" class="form" method="POST">
                        @csrf
                        @if ($errors->has('any'))
                            {{ dd($errors) }}
                        @endif
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') ? old('name') : $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ old('username') ? old('username') : $user->username }}" required>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') ? old('email') : $user->email }}" required>
                        </div>
                        <div class="form-group">

                            <label for="phoneNumber">Nomor telepon</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control"
                                value="{{ old('phoneNumber') ? old('phoneNumber') : $user->phoneNumber }}" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas</label>
                            <select name="class" id="class" class="form-control" required>
                                @foreach ($class as $item)
                                    <option value="{{ $item }}" {{ $item == $user->class ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @error('statement')
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
