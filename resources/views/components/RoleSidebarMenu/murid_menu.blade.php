<li class="nav-item {{request()->is('keuangan/pembayaran*') ? 'active' : ''}}">
    <a href="{{route("riwayatNilai")}}">
        <i class="fas fa-table"></i>
        <p>Lihat Riwayat Nilai</p>
    </a>
</li>

<li class="nav-item {{request()->is('keuangan/pembayaran*') ? 'active' : ''}}">
    <a href="{{route("riwayatAbsen")}}">
        <i class="fas fa-table"></i>
        <p>Lihat Riwayat Absen</p>
    </a>
</li>


<li class="nav-item {{request()->is('keuangan/pembayaran*') ? 'active' : ''}}">
    <a href="{{route("riwayatPembayaran")}}">
        <i class="fas fa-money-bill"></i>
        <p>Lihat Riwayat Pembayaran</p>
    </a>
</li>
