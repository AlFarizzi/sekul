@extends('welcome')

@section('content')
    <x-teachers.teachers :teachers="$teachers" />
@endsection
