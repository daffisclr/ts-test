<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    <table class="table table-bordered">
        <tr>
            <td>NIM</td>
            <td>Nama Alumni</td>
            <td>Program Studi</td>
            <td>Angkatan</td>
            <td>Lulusan</td>
        </tr>
        @foreach ( $users as $users)
        <tr>
            <td>{{ $users->username }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->alumni != null ? $users->alumni->prodi : '-' }}</td>
            <td>{{ $users->alumni != null ? $users->alumni->tahun_masuk : '-' }}</td>
            <td>{{ $users->alumni != null ? $users->alumni->tahun_lulus : '-' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
