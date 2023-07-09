@extends('main.main')
@section('start')

    <div class="card bg-dark text-white">
        <img src="{{asset('images/show.jpg')}}" class="card-img" alt="Stony Beach"/>
        <div class="card-img-overlay">
            <h5 class="card-title">{{$post->id}}.{{$post->title}}</h5>
            <p class="card-text">{{$post->name}}-{{$post->age}}</p>
            <p class="card-text">{{$post->created_at}}</p>
            <a href="{{route('posts.index')}}" class="btn btn-light" data-mdb-ripple-color="dark">Back</a>

            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="Delete" class="btn btn-light" data-mdb-ripple-color="dark">
            </form>
            <a type="button" href="{{route('posts.edit',$post->id)}}" class="btn btn-light btn-rounded">Update</a>


            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card bg-white p-2 text-white bg-opacity-25">
                            @foreach($post->comments as $comment)
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                             alt="avatar"
                                             width="60"
                                             height="60"/>
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                            <p class="text-muted small mb-0">{{$comment->created_at}}</p>
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-4 pb-2">{{$comment->text}}</p>
                                </div>
                            @endforeach

                            @guest()
                                <a type="button" href="{{route('login')}}" class="btn btn-light btn-rounded">Для
                                    коментирования нужно Войти в аккаунт </a>
                            @endguest
                            @auth('web')
                                <form action="{{route('comment')}}" method="post">
                                    @csrf
                                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                        <div class="d-flex flex-start w-100">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                 alt="avatar"
                                                 width="40"
                                                 height="40"/>
                                            <div class="form-outline w-100">
                <textarea name="text" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-end mt-2 pt-1">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
{{--    {{ $comments->links() }}--}}

    {{--    <section style="background-color: #eee;">--}}
    {{--        <div class="container my-5 py-5">--}}
    {{--            <div class="row d-flex justify-content-center">--}}
    {{--                <div class="col-md-12 col-lg-10 col-xl-8">--}}
    {{--                    <div class="card">--}}
    {{--                        @foreach($post->comments as $comment)--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="d-flex flex-start align-items-center">--}}
    {{--                                    <img class="rounded-circle shadow-1-strong me-3"--}}
    {{--                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar"--}}
    {{--                                         width="60"--}}
    {{--                                         height="60"/>--}}
    {{--                                    <div>--}}
    {{--                                        <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>--}}
    {{--                                        <p class="text-muted small mb-0">{{$comment->created_at}}--}}
    {{--                                        </p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <p class="mt-3 mb-4 pb-2">{{$comment->text}}</p>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}

    {{--                        @guest()--}}
    {{--                                <a type="button" href="{{route('login')}}" class="btn btn-light btn-rounded">Для коментирования нужно Войти в аккаунт </a>--}}
    {{--                            @endguest--}}
    {{--                        @auth('web')--}}
    {{--                        <form action="{{route('comment')}}" method="post">--}}
    {{--                            @csrf--}}
    {{--                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">--}}
    {{--                                <div class="d-flex flex-start w-100">--}}
    {{--                                    <img class="rounded-circle shadow-1-strong me-3"--}}
    {{--                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar"--}}
    {{--                                         width="40"--}}
    {{--                                         height="40"/>--}}
    {{--                                    <div class="form-outline w-100">--}}
    {{--                <textarea name="text" class="form-control" id="textAreaExample" rows="4"--}}
    {{--                          style="background: #fff;"></textarea>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="float-end mt-2 pt-1">--}}
    {{--                                    <input type="hidden" name="post_id" value="{{$post->id}}">--}}
    {{--                                    <button type="submit" class="btn btn-primary btn-sm">Post comment</button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                            @endauth--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

@endsection
