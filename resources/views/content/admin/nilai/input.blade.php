@extends('welcome')

@section('content')
<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="{{route('postAdminInputNilai',$student)}}" method="post">
              @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" readonly disabled value="{{$student->user->nama}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" readonly disabled value="{{$student->class->class}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="mapel"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                <option value="#" disabled selected>Pilih Mapel</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->mapel}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <input placeholder="Masukan Nilai Mapel Ini" type="number" name="nilai"  class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
