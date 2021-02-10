@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->user->nama}}</td>
        @if (request()->is("admin/view*") || request()->is("guru/view*"))
            <td>
                <a href="{{route(
                    Auth::user()->role->role === "admin"
                    ? "adminGetNilaiDetail"
                    : "guruGetNilaiDetail"
                    ,["class" => $classes, "student" => $student])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Detail</a>
            </td>
        @endif
        @if (request()->is("admin/lihat*") || request()->is("guru/lihat*"))
            <td>
                <a href="{{route(
                Auth::user()->role->role === "admin"
                ? "adminGetNilaiDetailRapor"
                : "guruGetNilaiDetailRapor"
                ,["class" => $classes, "student" => $student])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Detail</a>
            </td>
        @endif
    </tr>
@endforeach
