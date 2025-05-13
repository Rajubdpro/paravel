@extends('layouts.admin')
@section('content')
{{--   Edit user  --}}
<div class="row">
 <!---------------- Edit User ----------------->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text" name="id" disabled class="form-control" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>

                    <button type="submit" class="px-4 py-2  !text-white border border-transparent !rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="background: black">
                        Update User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
