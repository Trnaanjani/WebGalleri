@extends('admin.layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Album Galeri Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('galleries.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="post_id">Judul Album</label>
                    <select name="post_id" class="form-control @error('post_id') is-invalid @enderror" id="post_id" required>
                        <option value="">Pilih Judul Album</option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                                {{ $post->tittle }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                        <option value="">Pilih Status</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak-aktif" {{ old('status') == 'tidak-aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Album</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection