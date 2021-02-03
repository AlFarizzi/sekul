<form action="{{route('naikKelasExec')}}" method="post">
    @csrf
    @method('put')
    <tr>
        <div class="form-group">
            <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Naik Kelas</button>
        </div>
    </tr>
@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->user->nama}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nisn}}</td>
        <td>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10">
                        <select name="kelas[]"
                        id="selectFloatingLabel"
                        class="form-control input-border-bottom">
                        <option value="#" disabled selected>Kenaikan Kelas</option>
                        @foreach ($classes as $class)
                            <option {{
                                $class->id === $student->class_id ? "selected" : ''
                            }} value="{{$student->user_id.'-'.$class->id}}">{{$class->class}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach
</form>
