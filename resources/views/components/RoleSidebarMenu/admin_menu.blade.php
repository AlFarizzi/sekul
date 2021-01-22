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
{{-- --------- --}}
<li class="nav-item {{
    request()->is('admin/siswa*') || request()->is("search*") ? "active" : "" }}">
    <a data-toggle="collapse" href="#siswa" class="collapsed" aria-expanded="false">
        <i class="fas fa-users"></i>
        <p>Siswa</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="siswa">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("adminDataSiswa")}}">
                    <span class="sub-item">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{route("adminAddSiswa")}}">
                    <span class="sub-item">Tambah Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{route("adminDropoutSiswa")}}">
                    <span class="sub-item">Dropout System</span>
                </a>
            </li>
            <li>
                <a href="{{route("adminGetKelulusan")}}">
                    <span class="sub-item">Graduation System</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- ---------- --}}
<li class="nav-item">
    <a data-toggle="collapse" href="#submenu">
        <i class="fas fa-users"></i>
        <p>Pegawai</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="submenu">
        <ul class="nav nav-collapse">
            <li>
                <a data-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Guru</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav1">
                    <ul class="nav nav-collapse subnav">
                        <li>
                            <a href="{{route("adminAddGuru")}}">
                                <span class="sub-item">Tambah Guru</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route("adminGetGuru")}}">
                                <span class="sub-item">Data Guru</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#subnav2">
                    <span class="sub-item">Keuangan</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                        <li>
                            <a href="{{route("adminAddKeuangan")}}">
                                <span class="sub-item">Tambah Staff Keuangan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route("adminGetKeuangan")}}">
                                <span class="sub-item">Daftar Staff Keuangan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
{{-- ---------- --}}
<li class="nav-item
{{request()->is("admin/kelas*") ? 'active' : ''}}">
    <a data-toggle="collapse" href="#kelas" class="collapsed" aria-expanded="false">
        <i class="fas fa-chalkboard"></i>
        <p>Kelas</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="kelas">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("adminGetKelas")}}">
                    <span class="sub-item">Data Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{route("adminGetPostKelas")}}">
                    <span class="sub-item">Tambah Kelas</span>
                </a>
            </li>
        </ul>
    </div>
</li>
{{-- ---------- --}}
<li class="nav-item
{{request()->is("arsip*") ? 'active' : ''}}">
    <a data-toggle="collapse" href="#arsip" class="collapsed" aria-expanded="false">
        <i class="fas fa-archive"></i>
        <p>Arsip</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="arsip">
        <ul class="nav nav-collapse">
            <li>
                <a href="{{route("adminGetArsipDropout")}}">
                    <span class="sub-item">Dropout</span>
                </a>
            </li>
            <li>
                <a href="{{route("adminGetArsipGraduation")}}">
                    <span class="sub-item">Graduation</span>
                </a>
            </li>
        </ul>
    </div>
</li>
