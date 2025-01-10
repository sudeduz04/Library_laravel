@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>Kategoriler</h4>
            <a href="{{route('panel.createCategory')}}" class="btn btn-md btn-success">Yeni kategori oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">Kategoriler</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($categories as $category)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->name}}</strong></td>
                                <td>{{$category->created_at}}</td>
{{--                                <td>{{$category->updated_at}}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('panel.updateCategory', $category->id)}}" class="btn btn-sm btn-info">Güncelle</a>--}}
{{--                                    <a href="{{route('panel.deleteCategory', $category->id)}}" class ="btn btn-sm btn-danger">Sil</a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
