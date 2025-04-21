@extends('layouts.admin')
@section('content')
{{--   Edit user  --}}
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update')  }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="submit_btn mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
