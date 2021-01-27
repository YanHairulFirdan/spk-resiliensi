@extends('admin.layouts')
@section('content')
    <form action="/admin/question/import" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">

            <input type="file" class="form-control" placeholder="upload file excel" aria-label="Recipient's username"
                aria-describedby="basic-addon2" name="excel">
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit">Upload</button>
            </div>
        </div>
        @error('excel')
            <span class="alert alert-danger row" role="alert">
                {{ $message }}
            </span>
        @enderror
    </form>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Aspek</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Pertanyaan kuisioner</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quisioners as $quisioner)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $quisioner->question }}</td>
                            <td>
                                <a href="/admin/quisioner/{{ $quisioner->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/quisioner/{{ $quisioner->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus pertanyaan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
