@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nisn}}</td>
        <td>{{$student->user->nama}}</td>
        <td>{{$student->class->class}}</td>
        <td>{{$student->tahun_masuk}}</td>
        <td>{{$student->tahun_tamat}}</td>
        @if (request()->is("admin/siswa") || request()->is("search*") || request()->is("admin/kelas/member*"))
            <td style="display: flex;">
                <a onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
                href="{{route('adminDeleteSiswa',$student)}}" class="m-auto">Hapus</a>
                <a href="{{route('adminUpdateSiswa',$student)}}" class="ml-3">Update</a>
            </td>
        @endif
    </tr>
@endforeach
