@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/posts/{{ $post->id }}" method="post">
                @csrf

                @method('put')
                <div class="form-group mb-3">
    <label for="tittle">Judul</label>
    <input type="text" name="tittle" class="form-control" id="tittle" required value="{{ $post->tittle }}"> 
</div>

<div class="row">
    <div class="col">
        <div class="form-group mb-3">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $post->id) selected @endif>{{ $category->tittle }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col">
        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="publish" @if ($post->status == 'publish') selected @endif >Publish</option>
                <option value="draft" @if ($post->status == 'draft') selected @endif >Draft</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group mb-3">
    <label for="content">Isi</label>
    <textarea name="content" id="content" class="form-control" required value="{{ $post->content }}"></textarea>
</div>



                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
