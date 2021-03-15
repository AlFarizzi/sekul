<form action="{{route(Auth::user()->role->role."GetAbsenKelasMember",$classes)}}" method="post">
    @csrf
@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nisn}}</td>
        <td>{{$student->user->nama}}</td>
        <td>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10">
                        <select name="absen[]"
                        id="selectFloatingLabel"
                        class="form-control input-border-bottom">
                        <option value="#" disabled selected>Pilih Absen</option>
                        <option value="{{$student->user_id ."-hadir"}}">Hadir</option>
                        <option value="{{$student->user_id ."-izin"}}">Izin</option>
                        <option value="{{$student->user_id . "-sakit"}}">Sakit</option>
                        </select>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
    <tr>
        <div class="form-group">
            <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Absen</button>
        </div>
    </tr>
</form>
