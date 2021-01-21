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
                            @if (request()->is("admin/arsip/dropout"))
                                <th>Tanggal Dropout</th>
                                <th>Detail</th>
                            @endif
                            @if (request()->is("admin/siswa"))
                                <th>Kelas</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Tamat</th>
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            @if (request()->is("admin/arsip/dropout"))
                                <th>Tanggal Dropout</th>
                                <th>Detail</th>
                            @endif
                            @if (request()->is("admin/siswa"))
                                <th>Kelas</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Tamat</th>
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($students as $student)
                            @if (request()->is("admin/siswa"))
                              @include('components.students.dataOption.admin_siswa')
                            @endif
                            @if (request()->is("admin/arsip/dropout"))
                              @include('components.students.dataOption.admin_arsip_dropout')
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
