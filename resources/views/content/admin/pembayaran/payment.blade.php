@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route('adminDoPayment',$student)}}" method="post">
                    @csrf
                    @method("put")
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input disabled readonly value="{{Date("Y")}}" type="number" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input readonly value="{{$student->user->nama}}" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total SPP Saat Ini</label>
                                <input value="{{
                                    $student->user->debt->spp
                                }}" readonly type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total SPM Saat Ini</label>
                                <input value="{{
                                    $student->user->debt->spm
                                }}" readonly type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Hutang Saat Ini</label>
                                <input value="{{
                                    $student->user->debt->total
                                }}" readonly type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPP</label>
                                <input onkeypress="currency(this)" placeholder="SPP / Uang Sekolah Bulanan"
                                type="text" name="spp" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPM</label>
                                <input onkeypress="currency(this)" placeholder="SPM / Uang Pembangunan"
                                type="text" name="spm" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-save"></i> Simpan
                         </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
