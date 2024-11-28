@extends('admin.layout')

@section('content')
@php
$tittle = "Tambahkan Foto";
@endphp
<div class="row">
    <!-- Detail Galeri -->
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Judul Post</td>
                        <td>:</td>
                        <td>{{ $gallery->post->tittle }}</td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{ $gallery->position ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <span class="badge {{ $gallery->status == 'aktif' ? 'bg-success' : 'bg-warning' }}">
                                {{ Str::ucfirst($gallery->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Dibuat Pada</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Galeri Foto -->
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="m-0"><i data-feather="image"></i> Foto</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImageModal">
                    + Foto
                </button>
            </div>

            <div class="card-body bg-light">
                <!-- Tampilkan Pesan Validasi -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0 p-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Tampilkan Pesan Sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="row">
                    <!-- Looping Gambar -->
                    @forelse ($gallery->images as $image)
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <img src="{{ asset('images/' . $image->file) }}" alt="{{ $image->tittle }}" class="img-fluid">
                            <div class="p-2">
                                <h5>{{ $image->tittle }}</h5>
                                <div class="d-flex justify-content-between">
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-link btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#editImageModal-{{ $image->id }}">
                                        <i data-feather="edit"></i>
                                    </button>

                                    <!-- Form Hapus -->
                                    <form action="/images/{{ $image->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm text-danger"
                                            onclick="return confirm('Apakah Anda Yakin?')">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning">Tidak ada foto.</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Foto -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/images/store" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header text-secondary">
                <h5 class="modal-title" id="addImageModalLabel">+ Tambah Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-secondary">
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                <div class="mb-3">
                    <label for="file">Foto</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tittle">Judul</label>
                    <input type="text" name="tittle" id="tittle" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Foto -->
@foreach ($gallery->images as $image)
<div class="modal fade" id="editImageModal-{{ $image->id }}" tabindex="-1" aria-labelledby="editImageModalLabel-{{ $image->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/images/{{ $image->id }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header text-secondary">
                <h5 class="modal-title" id="editImageModalLabel-{{ $image->id }}">Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-secondary">
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                
                <div class="mb-3">
                    <label for="file-{{ $image->id }}">Ganti Foto (Opsional)</label>
                    <input type="file" name="file" id="file-{{ $image->id }}" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>
                
                <div class="mb-3">
                    <label for="tittle-{{ $image->id }}">Judul</label>
                    <input type="text" name="tittle" id="tittle-{{ $image->id }}" class="form-control" value="{{ $image->tittle }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
