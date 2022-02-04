@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <h4>
      @if ($post->category)
        {{$post->category->name}}
      @else
        -
      @endif
    </h4>
    <div>
      <a href="{{route("admin.posts.edit", $post)}}" class="btn btn-warning">EDIT</a>
    </div>
</div>
@endsection