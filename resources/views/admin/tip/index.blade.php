@extends('admin.layouts')
@section('content')
    <div class="form">
        <form action="/admin/tip/import" method="post" enctype="multipart/form-data">
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
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Tips</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">no.</th> --}}
                        <th scope="col">aspek</th>
                        <th scope="col">Tips</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspects as $aspect)
                        @foreach ($aspect->tips as $tip)
                            <tr>
                                {{-- <td>{{ $index + 1 }}</td> --}}
                                <td>{{ $aspect->aspect }}</td>
                                <td>{{ $tip->tips }}</td>
                                <td>
                                    <a href="/admin/tip/{{ $tip->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                    <form action="/admin/tip/{{ $tip->id }}" style="display: inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $tips->links() }} --}}
            <div class="my-2">
                <button class="btn btn-large btn-primary" data-toggle="modal" data-target="#tambahdata">Tambah data</button>
            </div>
        </div>
    </div>

    <div class="modal" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan data baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/admin/tip">
                        @csrf

                        <div class="form-group">
                            <label for="aspect_id">kategori aspek</label>
                            <select name="aspect_id" id="aspect_id" class="form-control">
                                @foreach ($aspects as $aspect)
                                    <option value="{{ $aspect->id }}">
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
                            <label for="tip">Tips</label>
                            <textarea class="form-control" id="tip" rows="2"
                                name="tips">{{ old('tip') ? old('tip') : '' }}</textarea>
                        </div>
                        @error('tip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="tipe">tipe</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="todo">Hal yang dilakukan</option>
                                <option value="suggestion">Saran</option>
                            </select>
                        </div>
                        @error('tipe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-large btn-primary">Tambah data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
