@extends('welcome')

@section('content')
    <x-students :students="$students" :classes="$classes" />
@endsection
