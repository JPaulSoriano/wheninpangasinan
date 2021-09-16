@extends('layouts.app')
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    
    <div class="row my-2">
        <div class="col-lg-12">
                <a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}">ADD POST</a>
        </div>
    </div>
   
   <div class="card">
       <div class="card-header bg-primary text-white">Posts</div>
       <div class="card-body">

       <table class="table table-light table-striped">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th width="280px">Action</th>
            <th width="280px">Feature</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ \Str::limit($post->content, 100) }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">   
                    <a class="btn btn-sm btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>    
                    <a class="btn btn-sm btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
            <td>
            @if($post->featured == 1)
                <form action="{{ route('unfeature', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Unfeature</button>
                </form>
                @else
                <a href="{{ route('feature', $post) }}"class="btn btn-sm btn-success btn-block my-1">Feature</a>
            @endif
            </td>
        </tr>
        @endforeach
    </table>
    
       </div>
   </div>
</div>   
@endsection