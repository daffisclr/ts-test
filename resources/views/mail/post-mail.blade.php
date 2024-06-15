<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Undangan Pengisian Survey Pengguna Alumni JTIK</title>
</head>
<body>

     Nama Pengguna Alumni: {{ $user->name }}

     <br><br>

     Email Pengguna Alumni: {{ $user->email }}

     <br><br>

     Nomor Telpon Pengguna Alumni: {{ $user->phone }}

     <br><br>

     Nama Perusahaan atau Instansi: {{ $user->company }}

     <br><br>

     Jabatan Pengguna Alumni: {{ $user->position }}

     <br><br>

     Email Perusahaan: {{ $user->company_contact }}

     <br><br>

     Kode Undangan: {{ $user->invite_code }}

     <br><br>

</body>
</html>
