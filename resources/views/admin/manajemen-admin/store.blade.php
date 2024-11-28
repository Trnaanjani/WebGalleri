@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Admin Berhasil Ditambahkan</h1>
    
    <p>Data admin baru telah berhasil disimpan.</p>
    
    <a href="{{ url('/users') }}" class="btn btn-secondary">Kembali ke Daftar Admin</a>
</div>
@endsection
