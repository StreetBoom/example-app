@extends('main.main')
@section('start')



    <div class="card bg-dark text-white">
        <img src="{{asset('images/index.jpg')}}" class="card-img" alt="Stony Beach"/>
        <div class="card-img-overlay">
    <div>
        @foreach($posts as $post)

            <div class="mb-1"><a type="button" class="btn btn-dark" href="{{route('posts.show',$post->id)}}">{{$post->id}}. {{$post-> name}}</a></div>

        @endforeach

    </div>
    {{ $posts->onEachSide(10)->links() }}
        </div>
    </div>
@endsection
