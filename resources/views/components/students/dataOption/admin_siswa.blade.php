<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$student->nis}}</td>
    <td>{{$student->nisn}}</td>
    <td>{{$student->user->nama}}</td>
    <td>{{$student->class->class}}</td>
    <td>{{$student->tahun_masuk}}</td>
    <td>{{$student->tahun_tamat}}</td>
    <td>
        <a href="{{route("adminFormDropout",$student)}}" class="btn btn-primary btn-sm">
            <i class="fa fa-user-ninja"></i> Dropout
        </a>
    </td>
    @if (request()->is("admin/siswa"))
        <td style="display: flex;">
            <a onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
            href="{{route('adminDeleteSiswa',$student)}}" class="m-auto">Hapus</a>
            <a href="{{route('adminUpdateSiswa',$student)}}" class="ml-3">Update</a>
        </td>
    @endif
</tr>
