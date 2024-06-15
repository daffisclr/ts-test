<x-mail::message>
Hi {{$user->name}}

Hi {{$user->email}}
Hi {{$user->phone}}
Hi {{$user->company}}
Hi {{$user->position}}
Hi {{$user->company_contact}}
Hi {{$user->invite_code}}

<x-mail::button url="{{ url('/validasi_pengguna_alumni') }}">
Survey Pengguna
</x-mail::button>

Thanks!

Team MyApp
</x-mail::message>
