@extends('welcome')

@section('content')
@if (Auth::user()->role->id === 4)
    <x-profile.siswa />
@else
    <x-profile.pegawai />
@endif
@endsection
