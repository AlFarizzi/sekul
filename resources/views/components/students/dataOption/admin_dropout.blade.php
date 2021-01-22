@foreach ($students as $student)
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
    </tr>
@endforeach
