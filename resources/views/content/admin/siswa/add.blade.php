@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminAddSiswa")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input placeholder="Masukan Nama Lengkap" name="nama" type="text" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Username</label>
                                 <input placeholder="Masukan Username" name="username" type="text" class="form-control">
                             </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" name="ayah" placeholder="Masukan Nama Ayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" name="ibu" placeholder="Masukan Nama Ibu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="class"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->class}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NISN</label>
                                <input placeholder="Masukan NISN Dengan Benar dan Valid" type="number" name="nisn" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIS</label>
                                <input placeholder="Masukan NIS Dengan Benar dan Valid" type="number" name="nis" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input placeholder="********" name="password" type="password" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input placeholder="Masukan Alamat Lengkap" name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input placeholder="Masukan Tempat Lahir e.g: Prov,Kab/Kota,Kec" name="tempat_lahir" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
