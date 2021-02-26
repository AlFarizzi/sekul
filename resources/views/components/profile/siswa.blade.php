<div class="page-inner">
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" disabled value="{{Auth::user()->nama}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" disabled value="{{Auth::user()->username}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" disabled value="{{Auth::user()->student->nama_ayah}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" disabled value="{{Auth::user()->student->nama_ibu}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="number" disabled value="{{Auth::user()->student->nisn}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="number" disabled value="{{Auth::user()->student->nis}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Total Sisa SPP</label>
                            <input type="number" disabled value="{{Auth::user()->debt->spp}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Total Sisa SPM</label>
                            <input type="number" disabled value="{{Auth::user()->debt->spm}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Total Sisa Hutang</label>
                            <input type="number" disabled value="{{Auth::user()->debt->spm + Auth::user()->debt->spp}}" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
