@extends('welcome')

@section('content')
<div class="page-inner">>
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
