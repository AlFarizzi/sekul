@extends('welcome')
@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{isset($s)
                ? route("updateMapel",$s)
                : route("adminAddSubject")}}" method="POST">
                    @isset($s)
                        @method('put')
                    @endisset
                    @csrf
                    <div class="form-group">
                        <label for="">Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control" placeholder="Masukan Mata Pelajaran"
                        value="{{
                            isset($s) ? $s->mapel : ''
                        }}"
                        >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus">
                                {{isset($s) ? 'Update' : 'Tambah'}} Mapel
                            </i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
