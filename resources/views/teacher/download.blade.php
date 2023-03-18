{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
--}}
<style>
    .table {
        border-collapse: collapse;
    }

    .table th,
    td {
        border: 1px solid black
    }

</style>
<div class="content table">
    <table class="table table-hover table-responsive table-bordered" style="">
        <thead>
            <tr>
                <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">no.</th>
                <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">Nama</th>
                <th scope="col" rowspan="2" class="text-center m-auto" style="vertical-align: top">Kelas</th>
                <th class="text-center" style="text-align: center" colspan="7">Skor</th>
            </tr>
            <tr>
                @foreach ($aspects as $aspect)
                    <th class="text-center" style="text-align: center; text-transform: capitalize">{{ $aspect->aspect }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataScores as $student)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td class="text-center" style="text-align: center; text-transform: capitalize">{{ $student->name }}</td>
                    <td class="text-center" style="text-align: center; text-transform: capitalize">{{ $student->class }}</td>
                    @if ($student->scores->count() == 0)
                        @for ($i = 0; $i < $aspects->count(); $i++)
                            <td style="text-align: center; text-transform: capitalize">0</td>
                        @endfor
                    @else
                        @foreach ($student->scores as $score)
                            <td style="text-align: center; text-transform: capitalize">{{ $score->score }}</td>
                        @endforeach
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
