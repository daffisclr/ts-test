<x-mail::message>
# Introduction

## Nama Pengguna Alumni: {{ $user->name }}

## Email Pengguna Alumni: {{ $user->email }}

## Nomor Telpon Pengguna Alumni: {{ $user->phone }}

## Nama Perusahaan atau Instansi: {{ $user->company }}

## Jabatan Pengguna Alumni: {{ $user->position }}

## Email Perusahaan:  {{ $user->company_contact }}

<x-mail::button :url="''">
Isi Survey
</x-mail::button>

Thanks,<br>
Tracer Study - Teknik Informatika dan Komputer Politeknik Negeri Jakarta
</x-mail::message>
