@extends('welcome')

@section('content')
    <x-student.graduate :students="$students" />
@endsection
