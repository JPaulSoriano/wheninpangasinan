@extends('layouts.app')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4 text-primary font-weight-bold">
     All Posts
    </h1>

  @foreach($allposts as $post)
    <div class="row">
      <div class="col-md-6">
          <img class="img-fluid rounded mb-3 mb-md-0 thumb-post" src="/image/{{ $post->image }}">
      </div>
      <div class="col-md-6">
        <div class="small text-muted mb-3">{{ $post->created_at->format('Y-m-d') }}</div>
        <h2 class="font-weight-bold">{{ $post->title }}</h2>
        <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->id) }}">Read more →</a>
      </div>
    </div>
    <!-- /.row -->

    <hr>
  @endforeach

  </div>
  <!-- /.container -->
@endsection