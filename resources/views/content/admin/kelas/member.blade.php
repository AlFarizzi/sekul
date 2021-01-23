@extends('welcome')

@section('content')
    <x-students.students :students="$students"/>
@endsection
