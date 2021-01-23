@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route('adminSettingPayment')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input disabled readonly value="{{Date("Y")}}" type="number" name="" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPP</label>
                                <input placeholder="SPP / Uang Sekolah Bulanan"
                                type="number" name="spp" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPM</label>
                                <input placeholder="SPM / Uang Pembangunan"
                                type="number" name="spm" class="form-control">
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
