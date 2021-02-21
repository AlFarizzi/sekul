<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="{{route("adminDropoutSiswa")}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$students->user_id}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input name="nama_siswa" type="text" class="form-control" readonly value="{{$students->user->nama}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Dropout</label>
                            <input type="date" name="tanggal_dropout" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Dropout</label>
                    <textarea
                    placeholder="Deskripsikan Alasan Murid Dropout"
                    class="form-control"
                    name="deskripsi"
                    cols="30" rows="10"></textarea>
                </div>
                <button onclick="return confirm('Yakin Akan Dropout Murid Ini ?')"
                class="ml-2 btn btn-primary btn-sm">
                    <i class="fa fa-user-ninja"></i> Dropout
                </button>
            </form>
        </div>
    </div>
</div>
