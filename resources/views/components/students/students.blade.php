<div class="page-inner">
    @if (request()->is("admin/siswa") || request()->is("search*"))
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
                            @if (request()->is("admin/arsip/dropout"))
                                @include('components.students.headerOption.dropout')
                            @endif
                            @if (request()->is("admin/siswa") || request()->is("admin/kelas/member*")  || request()->is("search*"))
                                @include('components.students.headerOption.students')
                            @endif
                            @if (request()->is("admin/arsip/graduation"))
                                @include('components.students.headerOption.graduation')
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        @if (request()->is("admin/arsip/dropout"))
                            @include('components.students.headerOption.dropout')
                        @endif
                        @if (request()->is("admin/siswa")  || request()->is("search*"))
                            @include('components.students.headerOption.students')
                        @endif
                        @if (request()->is("admin/arsip/graduation"))
                            @include('components.students.headerOption.graduation')
                        @endif
                    </tfoot>
                    <tbody>
                        @if (request()->is("admin/siswa")  || request()->is("search*"))
                          @include('components.students.dataOption.admin_siswa')
                        @endif
                        @if (request()->is("admin/siswa/dropout"))
                          @include('components.students.dataOption.admin_dropout')
                        @endif
                        @if (request()->is("admin/arsip/dropout"))
                          @include('components.students.dataOption.admin_arsip_dropout')
                        @endif
                        @if (request()->is("admin/arsip/graduation"))
                            @include('components.students.dataOption.arsip_graduation')
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
