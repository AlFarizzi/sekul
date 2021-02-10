@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route('adminGetNilaiDetail',['class' => $class,'student' => $student])}}">
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
                                <label for="">Mata Pelajaran</label>
                                <select name="mapel"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                <option value="#" disabled selected>Pilih Mata Pelajaran</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->mapel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Tanggal</th>
                                <th>Nilai</th>
                                <th>Semester</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>Tanggal</th>
                                <th>Nilai</th>
                                <th>Semester</th>
                                <th>Kategori</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($values as $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->user->nama}}</td>
                                    <td>{{$value->class->class}}</td>
                                    <td>{{$value->subject->mapel}}</td>
                                    <td>{{$value->created_at->format("d-F-Y")}}</td>
                                    <td>{{$value->nilai}}</td>
                                    <td>{{"Semester ".$value->semester}}</td>
                                    <td>{{$value->kategori}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
