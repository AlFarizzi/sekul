<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" disabled value="{{Auth::user()->nama}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" disabled value="{{Auth::user()->username}}" class="form-control">
                        </div>
                    </div>
                </div>.
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Role</label>
                            <input type="text" disabled value="{{Auth::user()->role->role}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Akun Dibuat</label>
                            <input type="text" disabled value="{{Auth::user()->created_at->format("m/d/Y")}}" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
