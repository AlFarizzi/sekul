@extends('welcome')

@section('content')
<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach ($absents as $absent)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$absent->user->nama}}</td>
                                <td>{{$absent->tanggal}}</td>
                                <td>{{$absent->jam}}</td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
