@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="m-2 p-2">
            <a href="/admin/answear/downloadexcel" class="btn btn-larger btn-success">Download data kuisioner</a>
        </div>
        <div class="card-header">
            <h3>Daftar Aspek</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">no.</th>
                        <th scope="col" class="text-center">nama</th>
                        <th scope="col" class="text-center">kelas</th>
                        <th scope="col" class="text-center">Jawaban 1</th>
                        <th scope="col" class="text-center">Jawaban 2</th>
                        <th scope="col" class="text-center">Jawaban 3</th>
                        <th scope="col" class="text-center">Jawaban 4</th>
                        <th scope="col" class="text-center">Jawaban 5</th>
                        <th scope="col" class="text-center">Jawaban 6</th>
                        <th scope="col" class="text-center">Jawaban 7</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($answears as $answear)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                            <td class="text-center">{{ $answear->user->name }}</td>
                            <td class="text-center">{{ $answear->user->class }}</td>
                            <td class="text-center">{{ $answear->answear_1 }}</td>
                            <td class="text-center">{{ $answear->answear_2 }}</td>
                            <td class="text-center">{{ $answear->answear_3 }}</td>
                            <td class="text-center">{{ $answear->answear_4 }}</td>
                            <td class="text-center">{{ $answear->answear_5 }}</td>
                            <td class="text-center">{{ $answear->answear_6 }}</td>
                            <td class="text-center">{{ $answear->answear_7 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $answears->links() }}
        </div>
    </div>
@endsection
