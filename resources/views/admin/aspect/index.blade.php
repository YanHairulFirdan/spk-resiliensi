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
                        <th scope="col" class="text-center">no.</th>
                        <th scope="col" class="text-center">aspek</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspects as $aspect)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                            <td class="text-center">{{ $aspect->aspect }}</td>
                            <td class="text-center">
                                <a href="/admin/aspect/{{ $aspect->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('admin.aspect.destroy', $aspect) }}" style="display: inline" method="post">
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
