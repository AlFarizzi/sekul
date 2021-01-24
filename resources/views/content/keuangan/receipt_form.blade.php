@extends('welcome')
{{-- {{dd($student->user->receipts)}} --}}
@section('content')
<div class="row">
    @foreach ($student->user->receipts as $receipt)
        <div class="col-md-6">
            <x-finance.receipt :receipt="$receipt" />
        </div>
    @endforeach
</div>
@endsection
