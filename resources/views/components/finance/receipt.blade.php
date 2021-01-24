<div class="page-inner">
    <div class="card card-dark bg-secondary-gradient">
        <div class="card-body bubble-shadow">
            <img src="/assets/img/visa.svg" height="12.5" alt="Visa Logo">
            <h2 class="py-4 mb-0">{{$receipt->user->student->nisn}}</h2>
            <div class="row">
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">{{$receipt->user->nama}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Siswa</div>
                </div>
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">{{$receipt->officer->nama}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Petugas</div>
                </div>
                <div class="col-4 pl-0 text-right">
                    <h3 class="fw-bold mb-1">{{$receipt->created_at->format("d-M-Y")}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Tanggal Bayar</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->spp)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">SPP</div>
                </div>
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->spm <= 0 ? 0 : $receipt->spm)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">SPM</div>
                </div>
                <div class="col-4 pl-0 text-right">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->spm + $receipt->spp)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Total Bayar</div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->user->debt->spp)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Sisa SPP</div>
                </div>
                <div class="col-4 pr-0">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->spm <= 0 ? 0 : $receipt->spm)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Sisa SPM</div>
                </div>
                <div class="col-4 pl-0 text-right">
                    <h3 class="fw-bold mb-1">Rp.{{number_format($receipt->sisa_hutang)}}</h3>
                    <div class="text-small text-uppercase fw-bold op-8">Siswa Tagihan</div>
                </div>
            </div>
        </div>
    </div>
</div>
