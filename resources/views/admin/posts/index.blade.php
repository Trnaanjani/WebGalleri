@extends('admin.layout')

@section('content')
@php
$tittle = "Halaman Post";
@endphp
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="/posts/create" class="btn btn-primary">Tambah Post</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->tittle }}</td>
                        <td>{{ $post->category->tittle ?? 'Tidak ada kategori' }}</td>
                        <td>{{ $post->user->nama ?? 'Tidak ada petugas' }}</td>
                        <td>
                            @if (Str::lower($post->status) == 'publish')
                            <span class="badge bg-success text-white">{{ Str::ucfirst($post->status) }}</span>
                            @else
                            <span class="badge bg-warning text-white">{{ Str::ucfirst($post->status) }}</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <button class="btn btn-info me-2 btn-sm" type="button" data-bs-toggle="modal"
                                data-bs-target="#postDetail{{ $post->id}}">
                                <i data-feather='info'></i>
                            </button>

                            <div class="btn-group" role="group">
                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning me-2 btn-sm">
                                    <i data-feather='edit'></i>
                                </a>
                                <form action="/posts/{{ $post->id }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin?')">
                                        <i data-feather='trash'></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@foreach ($posts as $post)
<!-- Modal Detail Post-->
<div class="modal fade" id="postDetail{{ $post->id}}" tabindex="-1" aria-labelledby="postDetail{{ $post->id}}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="postDetail{{ $post->id}}Label" data-feather="info">Detail Post </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-sm">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{ $post->tittle }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal di Buat</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td>Di Buat Oleh</td>
                        <td>:</td>
                        <td>{{ $post->user->nama }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{ Str::ucfirst($post->status) }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $post->category->tittle }}</td>
                    </tr>
                    <tr>
                        <td>Isi</td>
                        <td>:</td>
                        <td>{{ $post->content}}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endforeach
@endsection