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
                                <th>Nama Siswa</th>
                                <th>Nis</th>
                                <th>SPP</th>
                                <th>SPM</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Nis</th>
                                <th>SPP</th>
                                <th>SPM</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->user->nama}}</td>
                                    <td>{{$student->nis}}</td>
                                    <td>Rp.{{number_format($student->user->debt->spp)}}</td>
                                    <td>Rp.{{number_format($student->user->debt->spm)}}</td>
                                    <td>Rp.{{number_format($student->user->debt->total)}}</td>
                                    <td>
                                        <a href="{{route("keuanganDoPayment",$student)}}" class="">Bayar</a>
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
