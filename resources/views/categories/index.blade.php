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
                <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">ADD CATEGORY</a>
        </div>
    </div>
   
   <div class="card">
       <div class="card-header bg-primary text-white">Categories</div>
       <div class="card-body">

       <table class="table table-light table-striped">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="150">Action</th>
            <th width="150">Add to Menu</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">     
                    <a class="btn btn-sm btn-primary btn-block my-1" href="{{ route('categories.edit',$category->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Delete</button>
                </form>
            </td>
            <td>
            @if($category->menu == 1)
                <form action="{{ route('removemenu', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Remove Menu</button>
                </form>
                @else
                <a href="{{ route('addmenu', $category) }}"class="btn btn-sm btn-success btn-block my-1">Add Menu</a>
            @endif
            </td>
        </tr>
        @endforeach
    </table>
       </div>
   </div>
</div>    
@endsection