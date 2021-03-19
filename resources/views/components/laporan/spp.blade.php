<div class="page-inner">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{
                       request()->is("admin/laporan/spp") ? route("adminGetSppTotal") : route("adminGetSpmTotal")
                    }}" method="get">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input name="y" type="text" class="form-control" placeholder="Lihat Laporan Pada Tahun ?">
                                <div class="row ml-1 mt-1">
                                    <button class="mt-1 btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
                                    <a href="{{route(request()->is("admin/laporan/spp") ? "downloadLaporanSPP" : "downloadLaporanSPM", $total[0]->tahun)}}" class="mt-1 ml-2 btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i> Download Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{request()->is("admin/laporan/spp") ? "Total SPP Tahun Ini" : "Total SPM Tahun Ini"}}
                 : Rp.{{number_format($totalAmount)}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($total as $t)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$t->tahun}}</td>
                                <td>{{$t->bulan}}</td>
                                <td>Rp.{{number_format($t->total_spp)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
