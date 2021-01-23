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
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$admin->nik}}</td>
                            <td>{{$admin->user->nama}}</td>
                            <td>{{$admin->user->alamat}}</td>
                            <td>{{$admin->user->tempat_lahir}}</td>
                            <td>{{$admin->user->tanggal_lahir}}</td>
                            <td style="display: flex;">
                                <a onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
                                href="{{route("adminDeleteAdmin",$admin)}}" class="m-auto">Hapus</a>
                                <a href="{{route("adminUpdateAdmin",$admin)}}" class="ml-3">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
