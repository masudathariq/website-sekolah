@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit User: {{ $user->username }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <small>(kosongkan jika tidak ingin diubah)</small></label>
            <input type="password" class="form-control" id="password" name="password" minlength="6">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
