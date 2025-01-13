@extends('adminPanel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">
            <h4>Kitap güncelle </h4>
        </div>


        <div class="card-body">
            <p>Kitap Adı: {{$bookModel->name}}</p>


            <form action="{{route('panel.updateBookPost')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$bookModel->id}}" name="bookId">

                <label for="">Kitap Adı: </label>
                <input type="text" class="form-control" value="{{$bookModel->name}}" name="bookName">

                <button type="submit" class="btn btn-md btn-success mt-2">Güncelle</button>
            </form>


        </div>

    </div>

@endsection
