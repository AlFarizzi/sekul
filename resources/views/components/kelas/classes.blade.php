<div class="page-inner">
    @if (request()->is("admin/siswa/naik-kelas"))
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('konfirmasiNaikKelas')}}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="mx-auto d-block btn btn-primary btn-sm">
                            Konfirmasi Kenaikan Kelas
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Jumlah Murid</th>
                        <th>Detail</th>
                    </thead>
                    <tfoot>
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Jumlah Murid</th>
                        <th>Detail</th>
                    </tfoot>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$class->class}}</td>
                                <td>{{$class->students->count()}}</td>
                                @if (request()->is("admin/kelas"))
                                    <td>
                                        <a href="{{route("adminGetKelasMember",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                        <a href="{{route("adminGetUpdateKelas",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit Kelas
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/absen") || request()->is("guru/absen"))
                                    <td>
                                        <a href="{{route(Auth::user()->role->role."GetAbsenKelasMember",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/absen/review") || request()->is("guru/absen/review"))
                                <td>
                                    <a href="{{route("adminGetAbsen",["class" => $class, "guru" => Auth::user()])}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search-plus"></i> Detail
                                    </a>
                                </td>
                                @endif
                                @if (request()->is("admin/nilai*"))
                                    <td>
                                        <a href="{{route("adminGetMemberKelasNilai",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("guru/nilai*"))
                                    <td>
                                        <a href="{{route("guruGetMemberKelasNilai",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/rapor*") || request()->is("guru/rapor*"))
                                    <td>
                                        <a href="{{route(
                                            Auth::user()->role->role ==='admin'
                                            ? 'adminGetMemberKelasNilaiRapor'
                                            : 'guruGetMemberKelasNilaiRapor'
                                            ,$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/view*") || request()->is("guru/view*"))
                                    <td>
                                        <a href="{{route(
                                              Auth::user()->role->role === "admin"
                                              ? "adminViewDetailNilai"
                                              : "guruViewDetailNilai"
                                            ,$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/lihat/rapor") || request()->is("guru/lihat/rapor"))
                                    <td>
                                        <a href="{{route(
                                            Auth::user()->role->role === "admin"
                                            ? "adminViewDetailNilaiRapor"
                                            : "guruViewDetailNilaiRapor"
                                            ,$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/siswa/naik-kelas*"))
                                    <td>
                                        <a href="{{route("adminGetNaikKelasMember",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
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
