@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminGetPostKelas")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-chalkboard"></i> Simpan
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
