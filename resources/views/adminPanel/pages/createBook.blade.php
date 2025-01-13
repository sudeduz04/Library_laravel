@extends('adminPanel.layout.app')
@section('content')
    <form action="{{route('panel.createBookPost')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori Seç</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Yazar Seç</label>
            <select class="form-control" id="exampleFormControlSelect1" name="author_id">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Yayın evi seç</label>
            <select class="form-control" id="exampleFormControlSelect1" name="pub_id">
                @foreach($publicators as $publicator)
                    <option value="{{ $publicator->id }}">{{ $publicator->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="createBook" class="form-label">Kitap Adı:</label>
            <input type="text" class="form-control" id="bookCategory" name="bookName">
        </div>

        <!-- New fields added below -->
        <div class="mb-3">
            <label for="pageNumber" class="form-label">Sayfa Sayısı:</label>
            <input type="number" class="form-control" id="pageNumber" name="pageNumber">
        </div>

        <div class="mb-3">
            <label for="isLended" class="form-label">Kitap Durumu:</label>
            <select class="form-control" id="isLended" name="is_lended">
                <option value="0">Kütüphanede</option>
                <option value="1">Kullanıcıda</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="barkodNo" class="form-label">Barkod Numarası:</label>
            <input type="text" class="form-control" id="barkodNo" name="barkod_no">
        </div>

        <div class="mb-3">
            <label for="avaliableLendTime" class="form-label">Mevcut Ödünç Verme Süresi:</label>
            <input type="number" class="form-control" id="avaliableLendTime" name="avaliable_lend_time">
        </div>

        <button type="submit" class="btn btn-primary">Kitap ekle</button>

    </form>
@endsection
