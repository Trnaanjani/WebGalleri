@extends('admin.layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <!-- Form untuk Edit Galeri -->
            <form action="/galleries/{{ $gallery->id }}" method="post">
                @csrf
                @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan untuk update -->

                <div class="form-group mb-3">
                    <label for="post_id">Judul Post</label>
                    <select name="post_id" class="form-control" id="post_id" required>
                        <option value="">Pilih Post</option>
                        @foreach ($posts as $post)
                            <option value="{{ $post->id }}" {{ $gallery->post_id == $post->id ? 'selected' : '' }}>
                                {{ $post->tittle }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif" {{ $gallery->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak-aktif" {{ $gallery->status == 'tidak-aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
