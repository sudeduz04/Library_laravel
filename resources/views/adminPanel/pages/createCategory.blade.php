@extends('adminPanel.layout.app')
@section('content')
    <form action="{{route('panel.createCategoryPost')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="createCategory" class="form-label">Kategori oluştur</label>
            <input type="text" class="form-control" id="createCategory" name="category">
        </div>

        <button type="submit" class="btn btn-primary">Kategori ekle</button>

    </form>
@endsection
