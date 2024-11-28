@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Admin Dihapus</h1>

    <p>Data admin telah berhasil dihapus.</p>

    <a href="{{ url('/users') }}" class="btn btn-secondary">Kembali ke Daftar Admin</a>
</div>
@endsection
