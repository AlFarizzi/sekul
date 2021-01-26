@extends('welcome')

@section('content')
    <x-laporan.spp :total="$total" totalAmount="{{$totalAmount}}"/>
@endsection
