@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>Kategori güncelle </h4>
        </div>


        <div class="card-body">
            <p>Kategori Adı: {{$categoryModel->name}}</p>


            <form action="{{route('panel.updateCategoryPost')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$categoryModel->id}}" name="categoryId">

                <label for="">Kategori Adı: </label>
                <input type="text" class="form-control" value="{{$categoryModel->name}}" name="categoryName">

                <button type="submit" class="btn btn-md btn-success mt-2">Güncelle</button>
            </form>


        </div>

    </div>

@endsection
