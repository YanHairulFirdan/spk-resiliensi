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
                <th class="text-center" style="text-align: center">regulasi emosi</th>
                <th class="text-center" style="text-align: center">pengendalian impuls</th>
                <th class="text-center" style="text-align: center">optimis</th>
                <th class="text-center" style="text-align: center">percaya diri</th>
                <th class="text-center" style="text-align: center">analisis kausal</th>
                <th class="text-center" style="text-align: center">empati</th>
                <th class="text-center" style="text-align: center">reaching out</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataScores as $student)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td class="text-center" style="text-align: center">{{ $student->name }}</td>
                    <td class="text-center" style="text-align: center">{{ $student->class }}</td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->regulasi_emosi }}
                    </td>
                    <td class="text-center" style="text-align: center">
                        {{ optional($student->score)->pengendalian_impuls }}</td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->optimis }}</td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->percaya_diri }}
                    </td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->analisis_kausal }}
                    </td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->empati }}</td>
                    <td class="text-center" style="text-align: center">{{ optional($student->score)->reaching_out }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
