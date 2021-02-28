@extends('welcome')

@section('content')
<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <th>#</th>
                        <th>Mapel</th>
                        <th rowspan="2" style="text-align: center">Aksi</th>
                    </thead>
                    <tfoot>
                        <th>#</th>
                        <th>Mapel</th>
                        <th rowspan="2" style="text-align: center">Aksi</th>
                    </tfoot>
                    <tbody>
                        @foreach ($subjects as $s)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$s->mapel}}</td>
                                <td style="text-align: center">
                                    <a href="{{route("updateMapel",$s)}}" class="btn btn-primary btn-sm">
                                       <i class="fa fa-edit"></i> Edit Mapel
                                    </a>
                                    <a onclick="return confirm('Yakin Akan Menghapus Mata Pejalaran Ini ?')" href="{{route('deleteMapel',$s)}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus Mapel
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
