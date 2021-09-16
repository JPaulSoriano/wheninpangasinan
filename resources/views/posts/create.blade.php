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
            <div class="card-header bg-primary text-white">Create Post</div>
            <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
        
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <lable>Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
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
                        <lable>Content:</lable>
                        <textarea id="summernote" class="form-control" style="height:150px" name="content" placeholder="Enter Description"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control" type="text" data-role="tagsinput" name="tags" placeholder="Add Tags">
                        @if ($errors->has('tags'))
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-12 text-center my-3">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
@endsection