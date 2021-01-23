@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminPostAdmin")}}" method="post">
                    @csrf
                    @include('content.admin.form_pegawai')
                </form>
            </div>
        </div>
    </div>
@endsection
