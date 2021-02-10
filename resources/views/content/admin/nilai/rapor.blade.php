@extends('welcome')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("adminGetNilaiDetailRapor",[
                            "class" => $class,"student" => $student
                        ])}}" method="get">
                           <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester"  id="selectFloatingLabel"  class="form-control input-border-bottom">
                                <option value="#" disabled selected>Pilih Semester</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{$i}}">{{"Semester ".$i}}</option>
                                @endfor
                            </select>
                        </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-search-plus"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai Teori</th>
                            <th>Nilai Praktek</th>
                            <th>Nilai Sikap</th>
                            <th>Rata - Rata</th>
                            <th>Semester</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>#</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Teori</th>
                        <th>Nilai Praktek</th>
                        <th>Nilai Sikap</th>
                        <th>Rata - Rata</th>
                        <th>Semester</th>
                    </tfoot>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$report->subject->mapel}}</td>
                                <td>{{$report->nilai_teori}}</td>
                                <td>{{$report->nilai_praktek}}</td>
                                <td>{{$report->nilai_sikap}}</td>
                                <td>{{$report->rata}}</td>
                                <td>{{"Semester ".$report->semester}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
