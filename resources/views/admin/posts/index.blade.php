@extends('admin.layouts.layout')

@section('admin_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Посты</h1>
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
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="card-title">Список постов</h3>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Добавить
                                        пост</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        @if(count($posts))
                                            @foreach($posts as $post)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" style="position: relative;"
                                                        id="flush-heading{{$post->id}}">
                                                        <div class="accordion-button collapsed" type="button"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapse1{{$post->id}}"
                                                             aria-expanded="false"
                                                             aria-controls="flush-collapse1{{$post->id}}" style="gap: 120px;">
                                                            <div class="accordion-content"
                                                                 style="width: 100%;justify-content: space-between;">
                                                                <div class="accordion-content__title">
                                                                    <div class="table-responsive" data-bs-toggle="false">
                                                                        <table class="table table-bordered table-hover text-nowrap">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>{{$post->id}}</td>
                                                                                <td>{{$post->title}}</td>
                                                                                <td>
                                                                                    <img src="{{$post->getImage()}}" alt="" style="max-width: 200px;max-height: 200px">
                                                                                </td>
                                                                                <td>{{$post->created_at}}</td>
                                                                                {{--<td>
                                                                                    <div class="action" style="display: flex;">
                                                                                        <a href="#" class="btn btn-success btn-sm float-left mr-1" onclick="event.stopPropagation()">
                                                                                            <i class="fas fa-plus"></i>
                                                                                        </a>

                                                                                        <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-info btn-sm float-left mr-1" onclick="event.stopPropagation()">
                                                                                            <i class="fas fa-pencil-alt"></i>
                                                                                        </a>

                                                                                        <form action="{{route('admin.posts.delete',$post->id)}}" method="post" class="float-left" onclick="event.stopPropagation()">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
                                                                                                <i class="fas fa-trash-alt"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>
                                                                                </td>--}}
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="accordion-content__action"
                                                             style="margin-right: 15px;position: absolute;right: 34px;top: 118px;z-index: 10">
                                                            <a href="{{route('admin.comments.create',$post->id)}}"
                                                               class="btn btn-success btn-sm float-left mr-1">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                            <a href="{{route('admin.posts.edit',$post->id)}}"
                                                               class="btn btn-info btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>

                                                            <form
                                                                action="{{route('admin.posts.delete',$post->id)}}"
                                                                method="post" class="float-left" style="
    margin-top: -7px;
">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Подтвердите удаление')">
                                                                    <i
                                                                        class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </h2>

                                                    <div id="flush-collapse1{{$post->id}}"
                                                         class="accordion-collapse collapse"
                                                         aria-labelledby="flush-heading{{$post->id}}"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h4>Комментарий</h4>
                                                            @if(count($post->comments))
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-bordered table-hover text-nowrap">
                                                                        <tbody>
                                                                        @foreach($post->comments as $comment)
                                                                            <tr>
                                                                                <td>{{$comment->id}}</td>
                                                                                <td>{{$comment->text}}</td>
                                                                                <td>
                                                                                    <a href="{{route('admin.comments.edit',[$post->id,$comment->id])}}"
                                                                                       class="btn btn-info btn-sm float-left mr-1">
                                                                                        <i class="fas fa-pencil-alt"></i>
                                                                                    </a>

                                                                                    <form
                                                                                        action="{{route('admin.comments.delete',[$post->id,$comment->id])}}"
                                                                                        method="post"
                                                                                        class="float-left">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                                class="btn btn-danger btn-sm"
                                                                                                onclick="return confirm('Подтвердите удаление')">
                                                                                            <i
                                                                                                class="fas fa-trash-alt"></i>
                                                                                        </button>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @else
                                                                <p>Комменты пока нет...</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Посты пока нет...</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            dscosdcsdcimsdc
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

