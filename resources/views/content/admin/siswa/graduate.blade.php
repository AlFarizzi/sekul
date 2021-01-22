@extends('welcome')

@section('content')
    <x-students.graduate :students="$students" />
@endsection
