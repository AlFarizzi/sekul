@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route("adminGetUpdateKelas",$class)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="kelas" value="{{$class->class}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"> Update Kelas</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
