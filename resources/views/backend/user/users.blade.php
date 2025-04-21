@extends('layouts.admin');
@section('content')
 <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="d-inline">Users List</h3>
                <span class="float-right font-bold size-1/3"> Total Users: {{$total}}</span>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($Users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit</a>
                            @if(auth()->user()->id != $user->id)
                                <a href="{{Route('users.delete', $user->id)}}" class="btn btn-danger">Delete</a>
                            @endif
                        </td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
