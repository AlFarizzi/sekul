@extends('welcome')

@section('content')
    <x-students.dropout :students="$student" />
    {{-- <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminDropoutSiswa")}}" method="post">
                    @csrf
                    <input type="hidden" name="nama_siswa" value="{{$student->user_id}}">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" readonly value="{{$student->user->nama}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Dropout</label>
                                <input type="date" name="tanggal_dropout" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi Dropout</label>
                        <textarea placeholder="Deskripsikan Penyebab Dropout" class="form-control"
                        name="deskripsi" cols="30" rows="10"></textarea>
                    </div>
                    <button class="ml-2   btn btn-primary btn-sm">
                        <i class="fa fa-user-ninja"></i> Dropout
                    </button>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
