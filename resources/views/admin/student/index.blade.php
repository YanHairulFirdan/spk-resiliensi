@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Daftar Data Siswa</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nomor telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($students->currentpage() - 1) * $students->perpage() + 1;
                    @endphp
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->phoneNumber }}</td>
                            <td>
                                <a href="/admin/user/{{ $student->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/student/{{ $student->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                            {{-- <td><a href="/admin/user/{{ $student->id }}/edit" class="btn btn-warning text-white">Edit</a> --}}
                            {{-- </td> --}}
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        </div>
        <div class="d-flex justify-content-end m-2">
            <a href="/admin/student/download" class="btn btn-primary">Unduh data siswa</a>
        </div>
    </div>
@endsection
