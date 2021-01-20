@extends('welcome')

@section('content')
    <x-finance.finance :finances="$finances" />
@endsection
