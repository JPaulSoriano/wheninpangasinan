@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <div class="row justify-content-center">
      <div class="col-sm-8">
          <div class="card">
              <div class="card-header bg-primary text-white">Edit Post</div>
              <div class="card-body">
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select a category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Content:</label>
                                <textarea class="form-control" style="height:150px" name="content" placeholder="Detail">{{ $post->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <img src="/image/{{ $post->image }}" class="my-3" width="300px">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center my-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection