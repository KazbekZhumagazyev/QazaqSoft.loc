@extends('admin.layouts.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить коммент</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Коммент</li>
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
                            <h3 class="card-title">Новый коммент</h3>
                        </div>
                        <form role="form" method="post" action="{{route('admin.comments.store',$post->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body w-25">
                                <div class="form-group ">
                                    <label for="text">Коммент</label>
                                    <input type="text" name="text"
                                           class="form-control @error('text') is-invalid @enderror" id="text"
                                           placeholder="Коммент">
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
