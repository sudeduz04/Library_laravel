@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>Kitaplar</h4>
            <a href="{{route('panel.createBook')}}" class="btn btn-md btn-success">Yeni kitap oluştur</a>
        </div>

        <div class="card-body">
            <div class="card">
                <h5 class="card-header">Kitaplar</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kitap Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>İşlemler</th>
                            <th>Kategorisi</th>
                            <th>Yayın Evi</th>
                            <th>Yazarı</th>
                            <th>Sayfa Sayısı</th>
                            <th>Kitap Durumu</th>
                            <th>Barkod Numarası</th>
                            <th>Mevcut Ödünç Verme Süresi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($books as $book)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$book->name}}</strong></td>
                                <td>{{$book->created_at}}</td>
                                <td>{{$book->updated_at}}</td>
                                <td>
                                    <a href="{{route('panel.updateBook', $book->id)}}" class="btn btn-sm btn-info">Güncelle</a>
                                    <a href="{{route('panel.deleteBook', $book->id)}}" class ="btn btn-sm btn-danger">Sil</a>
                                </td>
                                <td>{{$book->categories->name}}</td>
                                <td>{{$book->publicators->name}}</td>
                                <td>{{$book->authors->name}}</td>
                                <td>{{$book->pageNumber}}</td>
                                <td>{{ $book->is_lended == 0 ? 'Kütüphanede' : 'Kullanıcıda' }}</td>
                                <td>{{$book->barkod_no}}</td>
                                <td>{{$book->avaliable_lend_time}} gün</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
