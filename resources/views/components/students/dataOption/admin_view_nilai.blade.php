@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->user->nama}}</td>
        <td>
            <a href="{{route("adminGetNilaiDetail",["class" => $classes, "student" => $student])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Detail</a>
        </td>
    </tr>
@endforeach
