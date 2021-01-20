<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="{{route("adminDropoutSiswa")}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <select name="nama_siswa"
                    id="selectFloatingLabel"
                    class="form-control input-border-bottom">
                        <option value="#" disabled selected>Pilih Nama Murid</option>
                        @foreach ($students as $student)
                            <option value="{{$student->user_id}}">
                                {{$student->user->nama}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Dropout</label>
                    <input type="date" name="tanggal_dropout" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi Dropout</label>
                    <textarea placeholder="Deskripsikan Alasan Murid Dropout"
                        class="form-control" name="deskripsi" cols="30" rows="10">
                    </textarea>
                </div>
                <button onclick="return confirm('Yakin Akan Dropout Murid Ini ?')"
                class="ml-2 btn btn-primary btn-sm">
                    <i class="fa fa-user-ninja"></i> Dropout
                </button>
            </form>
        </div>
    </div>
</div>
