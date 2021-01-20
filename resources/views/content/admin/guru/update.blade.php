@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminUpdateGuru",$target)}}" method="post">
                    @include('content.admin.form_update_pegawai')
                </form>
            </div>
        </div>
    </div>
@endsection
