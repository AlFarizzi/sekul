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
        </ul>
    </div>
</li>
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
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                        <li>
                            <a href="#">
                                <span class="sub-item">Level 2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <span class="sub-item">Level 1</span>
                </a>
            </li>
        </ul>
    </div>
</li>
