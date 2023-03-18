@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Daftar Hasil Tes Murid Anda</h3>
        </div>
        <div class="card-body">
            <div class="my-2 -2">
                <a href="/teacher/download" class="btn sm btn-success">Download Hasil Tes</a>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">no.</th>
                        <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">Nama</th>
                        <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">Kelas</th>
                        <th class="text-center" colspan="7">Skor</th>
                    </tr>
                    <tr>
                        @foreach ($aspects as $aspect)
                            <th>{{ $aspect->aspect }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataScores as $student)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->class }}</td>
                            @if ($student->scores->count() == 0)
                                @for ($i = 0; $i < $aspects->count(); $i++)
                                    <td>0</td>
                                @endfor
                            @else
                                @foreach ($student->scores as $score)
                                    <td>{{ $score->score }}</td>
                                @endforeach
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
