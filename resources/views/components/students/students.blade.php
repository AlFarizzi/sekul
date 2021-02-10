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
                            @if (request()->is("admin/absen/kelas*"))
                                @include('components.students.headerOption.absen')
                            @endif
                            @if (request()->is("admin/absen/review*"))
                                @include('components.students.headerOption.absen_review')
                            @endif
                            @if (
                                request()->is("admin/nilai*") ||
                                request()->is("admin/rapor*") ||
                                request()->is("admin/lihat*") ||
                                request()->is("guru/nilai*") ||
                                request()->is("guru/rapor*") ||
                                request()->is("guru/lihat*")
                            )
                                @include('components.students.headerOption.nilai_members')
                            @endif
                            {{-- @if (request()->is("guru/nilai*"))
                                @include('components.students.headerOption.nilai_members')
                            @endif --}}
                            @if (request()->is("admin/view*") || request()->is("guru/view*"))
                                @include('components.students.headerOption.admin_view_nilai')
                            @endif
                            @if (request()->is("admin/siswa/naik-kelas*"))
                                @include('components.students.headerOption.naik_kelas')
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        @if (request()->is("admin/arsip/dropout"))
                            @include('components.students.headerOption.dropout')
                        @endif
                        @if (request()->is("admin/siswa")  || request()->is("search*") || request()->is("admin/kelas/member*"))
                            @include('components.students.headerOption.students')
                        @endif
                        @if (request()->is("admin/arsip/graduation"))
                            @include('components.students.headerOption.graduation')
                        @endif
                        @if (request()->is("admin/absen/kelas*"))
                            @include('components.students.headerOption.absen')
                        @endif
                        @if (request()->is("admin/absen/review*"))
                            @include('components.students.headerOption.absen_review')
                        @endif
                        @if (
                            request()->is("admin/nilai*") ||
                            request()->is("admin/rapor*") ||
                            request()->is("admin/lihat*") ||
                            request()->is("guru/nilai*") ||
                            request()->is("guru/rapor*") ||
                            request()->is("guru/lihat*")
                        )
                            @include('components.students.headerOption.nilai_members')
                        @endif
                        @if (request()->is("admin/view*") || request()->is("guru/view*"))
                                @include('components.students.headerOption.admin_view_nilai')
                        @endif
                        @if (request()->is("admin/siswa/naik-kelas*"))
                            @include('components.students.headerOption.naik_kelas')
                        @endif
                    </tfoot>
                    <tbody>
                        @if (request()->is("admin/siswa")  || request()->is("search*") || request()->is("admin/kelas/member*"))
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
                        @if (request()->is("admin/absen/kelas*"))
                            @include('components.students.dataOption.absen')
                        @endif
                        @if (request()->is("admin/absen/review*"))
                            @include('components.students.dataOption.absen_review')
                        @endif
                        @if (
                            request()->is("admin/nilai*") ||
                            request()->is("admin/rapor*") ||
                            request()->is("guru/nilai*") ||
                            request()->is("guru/rapor*")
                            )
                            @include('components.students.dataOption.nilai_members')
                        @endif
                        @if (
                        request()->is("admin/view*") || request()->is("admin/lihat*") ||
                        request()->is("guru/view*") || request()->is("guru/lihat*")
                        )
                            @include('components.students.dataOption.admin_view_nilai')
                        @endif
                        @if (request()->is("admin/siswa/naik-kelas*"))
                            @include('components.students.dataOption.naik_kelas')
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
