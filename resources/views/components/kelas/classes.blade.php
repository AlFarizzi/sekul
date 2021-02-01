<div class="page-inner">

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
                                    </td>
                                @endif
                                @if (request()->is("admin/absen"))
                                    <td>
                                        <a href="{{route("adminGetAbsenKelasMember",$class)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search-plus"></i> Detail
                                        </a>
                                    </td>
                                @endif
                                @if (request()->is("admin/absen/review"))
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
                                @if (request()->is("admin/view*"))
                                <td>
                                    <a href="{{route("adminViewDetailNilai",$class)}}" class="btn btn-primary btn-sm">
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
