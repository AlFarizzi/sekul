<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama Guru</th>
                            <th>Alamat</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama Guru</th>
                            <th>Alamat</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($finances as $finance)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$finance->nik}}</td>
                            <td>{{$finance->user->nama}}</td>
                            <td>{{$finance->user->alamat}}</td>
                            <td>{{$finance->user->tempat_lahir}}</td>
                            <td>{{$finance->user->tanggal_lahir}}</td>
                            <td style="display: flex;">
                                <a onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
                                href="{{route("adminDeleteFinance",$finance)}}" class="m-auto">Hapus</a>
                                <a href="{{route("adminUpdateKeuangan",$finance)}}" class="ml-3">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
