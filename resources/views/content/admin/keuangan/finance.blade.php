@extends('welcome')

@section('content')
    <x-finance :finances="$finances" />
@endsection
