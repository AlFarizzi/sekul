@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminAddGuru")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Guru</label>
                                <input name="nama" type="text" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Username</label>
                                 <input name="username" type="text" class="form-control">
                             </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="number" name="nik" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" type="password" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
