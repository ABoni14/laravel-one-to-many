@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Post: {{$post->title}}</h2>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    

    <form action="{{route("admin.posts.update", $post)}}" method="POST">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" 
        value="{{old("title", $post->title)}}"
        class="form-control @error('title') is-invalid @enderror" 
        id="title" name="title"
        placeholder="Enter title">
        @error("title")
          <h6>{{$message}}</h6>
        @enderror
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea 
        class="form-control @error('content') is-invalid @enderror" 
        id="content" name="content"
        placeholder="Enter content">{{old("content", $post->content)}}
        </textarea>
        @error("content")
        <h6>{{$message}}</h6>
      @enderror
      </div>
      <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="catgory_id" id="category_id">
          <option >Categorie</option>
          @foreach ($categories as $category)
            <option @if($category->id == old("category_id")) selected @endif value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>
@endsection