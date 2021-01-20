@extends('welcome')

@section('content')
    <x-graduate :students="$students" />
@endsection
