@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/categories" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="tittle">Judul</label>
                    <input type="text" name="tittle" class="form-control" id="tittle" required>
                </div>

                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection