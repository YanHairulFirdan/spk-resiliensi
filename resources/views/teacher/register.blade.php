@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-bold">{{ __('Registrasi dulu yuk!') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('teacher.register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="">
                                    <input type=" text" class="form-control input-lg @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Nama">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input id="username" type="text"
                                        class="form-control input-lg @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="username"
                                        autofocus placeholder="Username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control input-lg @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input id="nip" type="text"
                                        class="form-control input-lg @error('nip') is-invalid @enderror" name="nip"
                                        value="{{ old('nip') }}" required placeholder="NIP">

                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <select name="class" id="class" class="form-control" value="{{ old('class') }}"
                                        required>
                                        <option value="X IPA I">X IPA I </option>
                                        <option value="X IPA II">X IPA II </option>
                                        <option value="X IPA III">X IPA III </option>
                                        <option value="X IPA IV">X IPA IV </option>
                                        <option value="X IPA V">X IPA V </option>
                                        <option value="X IPA VI">X IPA VI </option>
                                    </select>
                                    @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input id="subject" type="text"
                                        class="form-control input-lg @error('subject') is-invalid @enderror" name="subject"
                                        required placeholder="Mata pelajaran yang diampu">

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control input-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Konfirmasi password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
