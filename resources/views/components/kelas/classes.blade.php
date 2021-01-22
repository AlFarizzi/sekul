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
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search-plus"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
