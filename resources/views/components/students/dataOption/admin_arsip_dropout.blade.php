@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nisn}}</td>
        <td>{{$student->nama_siswa}}</td>
        <td>{{$student->tanggal_dropout}}</td>
        <td>
            <a href="{{route("adminGetDetailDropout",$student)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
        </td>
    </tr>
@endforeach
