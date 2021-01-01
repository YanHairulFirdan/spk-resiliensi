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
                        <th>regulasi emosi</th>
                        <th>pengendalian impuls</th>
                        <th>optimis</th>
                        <th>percaya diri</th>
                        <th>analisis kausal</th>
                        <th>empati</th>
                        <th>reaching out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataScores as $student)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ optional($student->score)->regulasi_emosi }}</td>
                            <td>{{ optional($student->score)->pengendalian_impuls }}</td>
                            <td>{{ optional($student->score)->optimis }}</td>
                            <td>{{ optional($student->score)->percaya_diri }}</td>
                            <td>{{ optional($student->score)->analisis_kausal }}</td>
                            <td>{{ optional($student->score)->empati }}</td>
                            <td>{{ optional($student->score)->reaching_out }}</td>
                            {{-- <td>
                                <a href="/admin/quisioner/{{ $quisioner->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                <form action="/admin/quisioner/{{ $quisioner->id }}" style="display: inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('apakah anda yakin ingin menghapus pertanyaan ini?')">Hapus</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
