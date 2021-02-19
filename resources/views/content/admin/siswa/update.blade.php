@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminUpdateSiswa",$student)}}" method="post">
                    @csrf
                    @method("put")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <input value="{{
                                    $student->user->nama
                                }}" name="nama" type="text" class="form-control">
                            </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Username</label>
                                 <input value="{{
                                     $student->user->username
                                 }}" name="username" type="text" class="form-control">
                             </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="class"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}" {{$student->class_id === $class->id ? "selected" : ""}}>{{$class->class}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NISN</label>
                                <input value="{{
                                    $student->nisn
                                }}" type="number" name="nisn" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIS</label>
                                <input value="{{
                                    $student->nis
                                }}" type="number" name="nis" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""> Tempat Lahir</label>
                                <input value="{{
                                    $student->user->tempat_lahir
                                }}" name="tempat_lahir" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input value="{{
                                    $student->user->tanggal_lahir
                                }}"  name="tanggal_lahir" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <x-auth.update_password  :target="$student"/>
    </div>
@endsection
