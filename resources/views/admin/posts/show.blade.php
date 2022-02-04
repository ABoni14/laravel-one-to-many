@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <h4 class="mb-3">
      @if ($post->category)
        Categoria: {{$post->category->name}}
      @else
        -
      @endif
    </h4>
    <div class="d-flex">
      <a href="{{route("admin.posts.edit", $post)}}" class="btn btn-warning mr-3">EDIT</a>
      <form onsubmit="return confirm('Vuoi davvero eliminare: {{$post->title}}')"
        action="{{route('admin.posts.destroy', $post)}}"
        method="POST"
        >
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </div>
</div>
@endsection