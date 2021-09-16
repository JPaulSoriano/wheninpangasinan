@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-sm-8">
        <h2 class="font-weight-bold">{{ $post->title }}</h2>
        <p>By {{ $post->user->name }}  {{ $post->created_at->format('Y-m-d') }}</p>
        <p class="badge badge-primary">{{ $post->tags->first()->name }}</p>
        <img src="/image/{{ $post->image }}" class="img-fluid mx-auto d-block w-100 header-post">
        <p class="text-justify">{!! $post->content !!}</p>
    </div>
    <div class="col-sm-4">
        @foreach($moreposts as $post)
            <div class="row">
            <div class="col-md-6">
                <img class="img-fluid rounded mb-3 mb-md-0 thumb-post" src="/image/{{ $post->image }}">
            </div>
            <div class="col-md-6">
                <div class="small text-muted mb-3">{{ $post->created_at->format('Y-m-d') }}</div>
                <h6 class="text-truncate font-weight-bold">{{ $post->title }}</h6>
                <a href="{{ route('posts.show',$post->id) }}">Read more →</a>
            </div>
            </div>
            <!-- /.row -->

            <hr>
        @endforeach
    </div>
</div>
</div>
@section('scripts')
<script>
$(document).ready(function(){
    $("img").addClass("img-responsive");
    $("img").css("max-width", "100%");
});
</script>
@endsection
@endsection