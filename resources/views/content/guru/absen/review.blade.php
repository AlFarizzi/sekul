@extends('welcome')

@section('content')
    <x-students.students :students="$absents" />
@endsection
