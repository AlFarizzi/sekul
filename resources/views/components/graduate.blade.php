<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <form method="post" action="{{route("adminPostKelulusan")}}">
                        @csrf
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-graduation-cap"></i> Lulus
                        </button>
                    </form>
                </div>
            </div>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
