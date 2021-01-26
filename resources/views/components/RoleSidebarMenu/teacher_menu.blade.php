<li class="nav-item {{request()->is('admin/pembayaran*') ? 'active' : ''}}">
    <a data-toggle="collapse" href="#absen" class="collapsed" aria-expanded="false">
        <i class="fas fa-table"></i>
        <p>Absen</p>
        <span class="caret"></span>
    </a>
    <div class="collapse" id="absen">
        <ul class="nav nav-collapse">
            <li>
                <a href="">
                    <span class="sub-item">Lihat Absen</span>
                </a>
            </li>
            <li>
                <a href="{{route("teacherAbsen")}}">
                    <span class="sub-item">Absen</span>
                </a>
            </li>
        </ul>
    </div>
</li>
