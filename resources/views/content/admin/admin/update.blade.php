@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminUpdateAdmin",$target)}}" method="post">
                    @include('content.admin.form_update_pegawai')
                </form>
            </div>
        </div>
        <x-auth.update_password :target="$target" />
    </div>
@endsection
