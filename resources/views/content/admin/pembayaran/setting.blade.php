@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <form action="{{route('adminSettingPayment')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" id="selectFloatingLabel" class="form-control input-border-bottom">
                            <option value="#" disabled selected>Pilih Tahun</option>
                            @for ($i = date("Y")-3; $i <= date("Y"); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPP</label>
                                <input onkeypress="currency(this)" id="setting" placeholder="SPP / Uang Sekolah Bulanan"
                                type="text" name="spp" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SPM</label>
                                <input onkeypress="currency(this)" alue="{{0}}" placeholder="SPM / Uang Pembangunan"
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
