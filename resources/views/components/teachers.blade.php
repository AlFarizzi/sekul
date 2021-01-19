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
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$teacher->nik}}</td>
                            <td>{{$teacher->user->nama}}</td>
                            <td>{{$teacher->user->alamat}}</td>
                            <td>{{$teacher->user->tempat_lahir}}</td>
                            <td>{{$teacher->user->tanggal_lahir}}</td>
                            <td style="display: flex;">
                                <a href="" class="m-auto">Hapus</a>
                                <a href="" class="ml-3">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
