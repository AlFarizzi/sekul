@extends('welcome')

@section('content')
<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="{{route('adminGetNilaiDetail',['class' => $class,'student' => $student])}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tahun</label>
                            <input placeholder="Masukan Tahun" type="number" name="tahun" class="form-control">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
