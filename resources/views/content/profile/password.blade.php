@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("changePassword")}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Password Lama</label>
                                <input type="password" name="old_password" class="form-control" placeholder="Masukan Password Lama Saat Ini">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password Baru Kamu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Komfirmasi Password Baru Kamu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"> Update Password</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
