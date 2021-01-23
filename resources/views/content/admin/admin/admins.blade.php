@extends('welcome')
@section('content')
    <x-admin.admins :admins="$admins" />
@endsection
