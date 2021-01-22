@foreach ($students as $student)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$student->nama}}</td>
        <td>{{$student->alamat}}</td>
        <td>{{$student->tempat_lahir}}</td>
        <td>{{$student->tanggal_lahir}}</td>
        <td>{{$student->tahun_masuk}}</td>
        <td>{{$student->tahun_tamat}}</td>
    </tr>
@endforeach
