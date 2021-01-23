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
                                <td>
                                    <a href="{{route("adminGetKelasMember",$class)}}" class="btn btn-primary btn-sm">
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
