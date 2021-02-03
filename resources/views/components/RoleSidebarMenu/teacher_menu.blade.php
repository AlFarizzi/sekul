<li class="nav-item">
    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
        <i class="fas fa-home"></i>
        <p>Dashboard</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="dashboard">
        <ul class="nav nav-collapse">
            <li>
                <a href="../demo1/index.html">
                    <span class="sub-item">Dashboard 1</span>
                </a>
            </li>
            <li>
                <a href="../demo2/index.html">
                    <span class="sub-item">Dashboard 2</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- --------------------------- --}}
<li class="nav-item {{request()->is("guru/absen*") ? 'active' : ''}}">
    <a data-toggle="collapse" href="#absen" class="collapsed" aria-expanded="false">
        <i class="fas fa-fingerprint"></i>
        <p>Absen Siswa</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="absen">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("guruGetAbsenKelas")}}">
                    <span class="sub-item">Absen Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{route("guruGetPreviewAbsen")}}">
                    <span class="sub-item">Preview Absen</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- --------------------------- --}}
<li class="nav-item {{request()->is("guru/view*") ? 'active' : ''}} ">
    <a data-toggle="collapse" href="#nilai" class="collapsed" aria-expanded="false">
        <i class="fas fa-table"></i>
        <p>Input Nilai</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="nilai">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("guruGetKelasNilai")}}">
                    <span class="sub-item">Input Nilai</span>
                </a>
            </li>
            <li>
                <a href="{{route("guruViewNilaiKelas")}}">
                    <span class="sub-item">Lihat Nilai</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- ------------------------------ --}}
