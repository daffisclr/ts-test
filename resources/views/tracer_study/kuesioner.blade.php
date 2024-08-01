@extends('layouts.admin')
@section('main-content')
    @if (isset($kuesioner))
        @livewire('kuesioner', [
            'kuesioner' => $kuesioner,
            'work' => $work,
            'education' => $education,
        ])
    @else
        @livewire('kuesioner')
    @endif
@endsection
