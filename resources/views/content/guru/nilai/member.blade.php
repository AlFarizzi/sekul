@extends('welcome')

@section('content')
    {{-- <div class="page-inner">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input placeholder="Masukan Tahun"
                                type="number" name="tahun" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="mapel"
                                id="selectFloatingLabel"
                                class="form-control input-border-bottom">
                                <option value="#" disabled selected>Pilih Mata Pelajaran</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->mapel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-search-plus">
                            Cari
                        </i>
                    </button>
                </div>
            </div>
        </form>
    </div> --}}
    <x-students.students :students="$students" :classes="$class" />
@endsection
