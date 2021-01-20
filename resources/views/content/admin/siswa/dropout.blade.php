@extends('welcome')

@section('content')
    <x-students.dropout :students="$students" />
@endsection
