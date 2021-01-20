@csrf
@method('put')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama</label>
            <input value="{{
                $target->user->nama
            }}" name="nama" type="text" class="form-control">
        </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Username</label>
                <input value="{{
                $target->user->username
            }}" name="username" type="text" class="form-control">
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">NIK</label>
            <input value="{{
                $target->nik
            }}" type="number" name="nik" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Alamat</label>
            <input value="{{
                $target->user->alamat
            }}" name="alamat" type="text" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input value="{{
                $target->user->tempat_lahir
            }}" name="tempat_lahir" type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input value="{{
                $target->user->tanggal_lahir
            }}" name="tanggal_lahir" type="date" class="form-control">
        </div>
    </div>
</div>
<button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
