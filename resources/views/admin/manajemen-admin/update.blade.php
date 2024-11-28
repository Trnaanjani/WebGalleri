@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Update Admin</h1>

    <form action="{{ url('/users/' . $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan PUT untuk update -->

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password (biarkan kosong jika tidak diubah):</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ url('/users') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
