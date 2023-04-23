@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование поста</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование</li>
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
                            <h3 class="card-title">{{$post->title}}</h3>
                        </div>
                        <form role="form" method="post" action="{{route('admin.posts.update',$post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body w-25">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                    value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="poster">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="poster" id="poster"
                                                   class="custom-file-input">
                                            <label class="custom-file-label" for="poster">выберите изображение</label>
                                        </div>
                                    </div>
                                    <div><img src="{{$post->getImage()}}" alt="" class="img-thumbnail mt-2" width="200"></div>
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
    <script>
        var input = document.getElementById('poster');
        var label = input.nextElementSibling;
        input.addEventListener('change', function (event) {
            var fileName = event.target.files[0].name;
            label.innerHTML = fileName;
        });
    </script>
@endsection
