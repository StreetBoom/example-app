@extends('main.main')
@section('start')


    <div class="card bg-dark text-white">
        <img src="{{asset('images/edit.jpg')}}" class="d-block w-100" alt="Canyon at Nigh"/>
        <div class="card-img-overlay">
        <form action="{{route('posts.update',$post->id)}}" method="post">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">

            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">

            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="intager" class="form-control" id="age" aria-describedby="emailHelp" name="age">


@

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        </div>
        </div>

@endsection
