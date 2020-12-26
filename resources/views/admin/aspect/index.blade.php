@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Daftar Aspek</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">aspek</th>
                        <th scope="col">Kelebihan</th>
                        <th scope="col">Kekurangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspects as $aspect)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $aspect->aspect }}</td>
                            <td>{{ $aspect->strength_suggestion }}</td>
                            <td>{{ $aspect->weak_suggestion }}</td>
                            <td>
                                <a href="/aspect/{{ $aspect->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/aspect/{{ $aspect->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus aspek {{ $aspect->aspect }}?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
