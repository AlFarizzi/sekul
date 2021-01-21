<div class="page-inner">
    @if (request()->is("admin/siswa"))
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{route("searchStudent")}}" method="get">
                        <div class="row">
                            <div class="col-md-10">
                                <select name="q"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                <option value="#" disabled selected>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button class="mt-1 btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Tamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Tamat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->nis}}</td>
                            <td>{{$student->nisn}}</td>
                            <td>{{$student->user->nama}}</td>
                            <td>{{$student->class->class}}</td>
                            <td>{{$student->tahun_masuk}}</td>
                            <td>{{$student->tahun_tamat}}</td>
                            <td>
                                <a href="{{route("adminFormDropout",$student)}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-user-ninja"></i> Dropout
                                </a>
                            </td>
                            @if (request()->is("admin/siswa"))
                                <td style="display: flex;">
                                    <a onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
                                    href="{{route('adminDeleteSiswa',$student)}}" class="m-auto">Hapus</a>
                                    <a href="{{route('adminUpdateSiswa',$student)}}" class="ml-3">Update</a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
