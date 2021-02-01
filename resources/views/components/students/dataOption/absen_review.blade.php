<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <form action="{{route("adminGetAbsen",[
                "class" => session('params')[0],
                "guru" => session("params")[1]
            ])}}" method="get">
                <div class="row">
                    <div class="col-md-10">
                        <select name="h"
                        id="selectFloatingLabel"
                        class="form-control input-border-bottom">
                        <option value="#" disabled selected>Pilih Jam</option>
                            @foreach (session("params")[2] as $item)
                                <option {{
                                    request()->get("h") === $item->jam ? 'selected' : ''
                                }} value="{{$item->jam}}">{{$item->jam}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button class="mt-1 btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<form action="{{route('adminEditAbsen',[
    "class" => session('params')[0],
    "guru" => session("params")[1]
])}}" method="post">
    @csrf
    @method("put")
    @isset($students[0])
        <input type="hidden" name="jam" value="{{$students[0]->jam}}">
    @endisset
    @foreach ($students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->user->nama}}</td>
            <td>{{$student->tanggal}}</td>
            <td>{{$student->jam}}</td>
            <td>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-10">
                            <select name="absen[]"
                            id="selectFloatingLabel"
                            class="form-control input-border-bottom">
                            <option value="#" disabled selected>Pilih Absen</option>
                            <option {{
                                $student->keterangan === "hadir" ? "selected" : ""
                            }} value="{{$student->user_id ."-hadir"}}">Hadir</option>
                            <option {{
                                $student->keterangan === "izin" ? "selected" : ""
                            }} value="{{$student->user_id ."-izin"}}">Izin</option>
                            <option {{
                                $student->keterangan === "sakit" ? "selected" : ""
                            }} value="{{$student->user_id . "-sakit"}}">Sakit</option>
                            </select>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    <tr>
        <div class="form-group">
            <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Edit Absen</button>
        </div>
    </tr>
</form>
