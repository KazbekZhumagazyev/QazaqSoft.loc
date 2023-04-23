@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование коммента</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование коммента</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Коммент - {{$comment->id}}</h3>
                        </div>
                        <form role="form" method="post" action="{{route('admin.comments.update',[$post->id,$comment->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body w-25">
                                <div class="form-group ">
                                    <label for="text">Коммент</label>
                                    <input type="text" name="text"
                                           class="form-control @error('text') is-invalid @enderror" id="text"
                                           value="{{$comment->text}}">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
