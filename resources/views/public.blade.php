@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-6">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carousel">
                        @foreach($latestposts as $post)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/image/{{ $post->image }}" style="height:40vh; object-fit: cover; width: 100%;">
                            <div class="carousel-caption" style="background: linear-gradient(transparent,#000); right:0; left:0; bottom:0">
                                <h3 class="text-left mx-5 font-weight-bold ">{{ $post->category->name }}</h3>
                                <h5 class="text-left mx-5">{{ $post->title }}</h5>
                                <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Read more →</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="font-weight-bold text-primary">FEATURED POSTS</h3>
                </div>
            </div>
            <div class="row mb-4">
            @foreach($featuredposts as $post)
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <img class="card-img-top" src="/image/{{ $post->image }}" style="height:20vh">
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at->format('Y-m-d') }}</div>
                            <h2 class="card-title text-truncate font-weight-bold">{{ $post->title }}</h2>
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->id) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="font-weight-bold text-primary">POSTS</h3>
                </div>
            </div>
            <div class="row">
                @foreach($latestposts as $post)
                <div class="col-lg-4 my-2">
                    <div class="card">
                    <img src="/image/{{ $post->image }}" class="card-img-top img-fluid" style="height:20vh">
                    <div class="card-body">
                        <div class="small text-muted">{{ $post->created_at->format('Y-m-d') }}</div>
                        <p class="card-title fs-6 font-weight-bold text-truncate">{{ $post->title }}</p>
                        <a class="btn btn-primary btn-sm" href="{{ route('posts.show',$post->id) }}">Read more →</a>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Categories</div>
                <div class="card-body">
                    <div class="row">
                         @foreach($categories as $category)
                        <div class="col-sm-6">
                                <a href="{{ route('categorizedpost', $category) }}">{{ $category->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
        <div class="col-lg-2">
            <p class="my-5">Place your ADS here.</p>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function () {
  $('#carousel').find('.carousel-item').first().addClass('active');
});
</script>
@endsection