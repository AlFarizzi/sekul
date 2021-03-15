@extends('welcome')

@section('content')
<div class="page-inner">
    <div class="card">
        <div class="card-body">
            @if (request()->is("guru/nilai*"))
                <form action="{{route('guruPostInputNilai',$student)}}" method="post">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Semester</label>
                                <select name="semester"  id="selectFloatingLabel"  class="form-control input-border-bottom">
                                    <option value="#" disabled selected>Pilih Semester</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{$i}}">{{"Semester ".$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori"  id="selectFloatingLabel"  class="form-control input-border-bottom">
                                    <option value="#" disabled selected>Pilih Kategori</option>
                                    <option value="teori">Teori</option>
                                    <option value="praktek">Praktek</option>
                                    <option value="sikap">Sikap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                </form>
            @endif
            @if (request()->is("guru/rapor*"))
                <form action="{{route("postGuruInputNilaiRapor",[
                    "student" => $student
                ])}}" method="post">
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
                                <label for="">Semester</label>
                                <select name="semester"  id="selectFloatingLabel"  class="form-control input-border-bottom">
                                    <option value="#" disabled selected>Pilih Semester</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{$i}}">{{"Semester ".$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nilai Teori</label>
                                <input placeholder="Masukan Nilai Teori Mapel Ini" type="number" name="nilai_teori"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nilai Praktek</label>
                                <input placeholder="Masukan Nilai Praktek Mapel Ini" type="number" name="nilai_praktek"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nilai Sikap</label>
                                <input placeholder="Masukan Nilai Sikap Mapel Ini" type="number" name="nilai_sikap"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
