@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input disabled value="{{$student->nama_siswa}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Dropout</label>
                            <input disabled value="{{$student->tanggal_dropout}}" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="number" readonly value="{{$student->nisn}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="number" readonly class="form-control" value="{{$student->nis}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi Dropout</label>
                    <textarea class="form-control" readonly cols="30" rows="10">
                        {{$student->deskripsi}}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
