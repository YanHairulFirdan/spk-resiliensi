@extends('admin.layouts')
@section('content')
    <div class="card">
        <div class="m-2 p-2">
            <a href="/admin/answear/scoresexcel" class="btn btn-larger btn-success">Download data kuisioner</a>
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
                        @foreach ($aspects as $aspect)
                            <th scope="col" class="text-center">{{ $aspect }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->index + 1 }}</th>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->class }}</td>
                            {{-- {{ dd($user->score->regulasi_emosi) }} --}}
                            <td class="text-center">{{ optional($user->score)->regulasi_emosi }}</td>
                            <td class="text-center">{{ optional($user->score)->pengendalian_impuls }}</td>
                            <td class="text-center">{{ optional($user->score)->optimis }}</td>
                            <td class="text-center">{{ optional($user->score)->percaya_diri }}</td>
                            <td class="text-center">{{ optional($user->score)->analisis_kausal }}</td>
                            <td class="text-center">{{ optional($user->score)->empati }}</td>
                            <td class="text-center">{{ optional($user->score)->reaching_out }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $answears->links() }} --}}
        </div>
    </div>
@endsection
