@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->user->nama}}</td>
        @if (request()->is("admin/nilai*") || request()->is("guru/nilai*"))
            <td>
                <a href="{{route(
                Auth::user()->role->role === "admin"
                ? "adminInputNilai" : 'guruInputNilai'
                ,["class" => $classes, "student" => $student])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Nilai</a>
            </td>
        @endif
        @if (request()->is("admin/rapor*") || request()->is("guru/rapor*"))
            <td>
                <a href="{{route(
                    Auth::user()->role->role === "admin"
                    ? "adminInputNilaiRapor"
                    : "guruInputNilaiRapor"
                    ,["class" => $classes, "student" => $student])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Nilai</a>
            </td>
        @endif
    </tr>
@endforeach
