<li class="nav-item {{request()->is('keuangan/pembayaran*') ? 'active' : ''}}">
    <a data-toggle="collapse" href="#pembayaran" class="collapsed" aria-expanded="false">
        <i class="fas fa-money-bill"></i>
        <p>Pembayaran</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="pembayaran">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("keuanganSettingPayment")}}">
                    <span class="sub-item">Setting</span>
                </a>
            </li>
            <li>
                <a href="{{route("getPaymentSetting")}}">
                    <span class="sub-item">Lihat Setting</span>
                </a>
            </li>
            <li>
                <a href="{{route("getUserDebt")}}">
                    <span class="sub-item">Bayar</span>
                </a>
            </li>
            <li>
                <a href="{{route("getUserReceipt")}}">
                    <span class="sub-item">Kwitansi</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- -------------------------- --}}
<li class="nav-item
    {{request()->is("keuangan/laporan*") ? 'active' : ''}}">
    <a data-toggle="collapse" href="#audit" class="collapsed" aria-expanded="false">
        <i class="fas fa-file-invoice-dollar"></i>
        <p>Laporan Keuangan</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="audit">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("keuanganGetSppTotal")}}">
                    <span class="sub-item">Laporan Pemasukan SPP</span>
                </a>
            </li>
            <li>
                <a href="{{route("keuanganGetSpmTotal")}}">
                    <span class="sub-item">Laporan Pemasukan SPM</span>
                </a>
            </li>
        </ul>
    </div>
</li>
