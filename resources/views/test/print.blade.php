<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Tes Depresi</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('asset/logo.png') }}" style="height: 55px;" alt="">

    <div style="margin-top: 60px">
        <h4 style="font-weight: 0">Nama : {{ $test->User->name }}</h4>
        <h4 style="font-weight: 0">Jenis Kelamin : {{ $test->User->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}</h4>
        <h4 style="font-weight: 0">Email : {{ $test->User->email }}</h3>
    </div>
    <div style="margin-top: 40px">
        <table style="width: 100%; font-size: 13px;">
            <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th>Pertanyaan</th>
                    <th style="width: 17%">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($test->QuestionUserAnswer as $item)
                    <tr>
                        <td style="text-align: center;">{{ $no++ }}</td>
                        <td>{{ $item->Question->question }}</td>
                        <td>
                            @switch($item->answer)
                                @case('a')
                                    Tidak Pernah
                                    @break
                                @case('b')
                                    Jarang
                                    @break
                                @case('c')
                                    Kadang - kadang
                                    @break
                                @case('d')
                                    Sering
                                    @break
                                @case('e')
                                    Sangat Sering
                                    @break
                                @default
                                -
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top: 30px; text-align: center;">
            <h3 >Hasil : {{ $test->score }}</h3>
            <h3 >{{ $test->Result->name }}</h3>
            <div>
                <h4 style="font-weight: 0">Cara Penanganan: </h3>
                <br>
                {!! $test->Result->handling !!}
            </div>
        </div>
    </div>
</body>
</html>
