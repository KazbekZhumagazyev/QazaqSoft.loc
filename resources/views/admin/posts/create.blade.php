@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый пост</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Посты</li>
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
                            <h3 class="card-title">Новый пост</h3>
                        </div>
                        <form role="form" method="post" action="{{route('admin.posts.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body w-25">
                                <div class="form-group ">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
                                </div>

                                <div class="form-group">
                                    <label for="poster">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="poster" id="poster"
                                                   class="custom-file-input">
                                            <label class="custom-file-label" for="poster">Выбрать файл</label>
                                        </div>
                                    </div>
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
