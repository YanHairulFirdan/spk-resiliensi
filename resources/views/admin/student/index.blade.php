@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Daftar Aspek</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">no.</th>
                        <th scope="col">nama</th>
                        <th scope="col">username</th>
                        <th scope="col">kelas</th>
                        <th scope="col">nomor telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->phoneNumber }}</td>
                        </tr>
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
