<li class="nav-item {{request()->is('admin/pembayaran*') ? 'active' : ''}}">
    <a data-toggle="collapse" href="#pembayaran" class="collapsed" aria-expanded="false">
        <i class="fas fa-money-bill"></i>
        <p>Pembayaran</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="pembayaran">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("financeGetPaymentSetting")}}">
                    <span class="sub-item">Lihat Setting</span>
                </a>
            </li>
            <li>
                <a href="{{route("financeGetUserDebt")}}">
                    <span class="sub-item">Bayar</span>
                </a>
            </li>
            <li>
                <a href="{{route("financeGetUserReceipt")}}">
                    <span class="sub-item">Kwitansi</span>
                </a>
            </li>
        </ul>
    </div>
</li>
