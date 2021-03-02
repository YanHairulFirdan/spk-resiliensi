@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data guru</div>
                <div class="card-body">
                    <form action="/admin/teacher/{{ $teacher->id }}" class="form" method="POST">
                        @csrf
                        @if ($errors->has('any'))
                            {{ dd($errors) }}
                        @endif
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') ? old('name') : $teacher->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ old('username') ? old('username') : $teacher->username }}" required>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') ? old('email') : $teacher->email }}" required>
                        </div>
                        <div class="form-group">

                            <label for="phoneNumber">Nomor Induk Pegawai</label>
                            <input type="text" name="nip" id="nip" class="form-control"
                                value="{{ old('nip') ? old('nip') : $teacher->nip }}" required>
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas</label>
                            <select name="class" id="class" class="form-control" required>
                                @foreach ($class as $item)
                                    <option value="{{ $item }}" {{ $item == $teacher->class ? 'selected' : '' }}>
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
                        <div class="form-group">
                            <label for="subject">Mata Pelajaran</label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                value="{{ old('subject') ? old('subject') : $teacher->subject }}" required>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-large btn-primary">Perbaharui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
