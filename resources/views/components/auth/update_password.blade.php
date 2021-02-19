<div class="card">
    <div class="card-body">
        <form action="{{route("updatePassword", $target)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">New Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
