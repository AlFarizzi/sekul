@extends('welcome')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tahun</th>
                                <th>SPP</th>
                                <th>SPM</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Tahun</th>
                                <th>SPP</th>
                                <th>SPM</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$setting->tahun}}</td>
                                    <td>Rp.{{number_format($setting->spp)}}</td>
                                    <td>Rp.{{number_format($setting->spm)}}</td>
                                    <td>Rp.{{number_format($setting->total)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
