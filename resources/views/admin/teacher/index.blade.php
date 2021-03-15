@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Daftar Data Guru</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mata pelajaran yang diampu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($teachers->currentpage() - 1) * $teachers->perpage() + 1;
                    @endphp
                    @foreach ($teachers as $teacher)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->username }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->class }}</td>
                            <td>{{ $teacher->subject }}</td>
                            <td>
                                <a href="/admin/teacher/{{ $teacher->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/teacher/{{ $teacher->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $teachers->links() }}
        </div>
    </div>
@endsection
