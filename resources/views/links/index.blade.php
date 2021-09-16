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
                <a class="btn btn-sm btn-primary" href="{{ route('links.create') }}">ADD LINK</a>
        </div>
    </div>
   
   <div class="card">
       <div class="card-header bg-primary text-white">Link</div>
       <div class="card-body">

       <table class="table table-light table-striped">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Link</th>
            <th width="150">Action</th>
        </tr>
        @foreach ($links as $link)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $link->name }}</td>
            <td>{{ $link->link }}</td>
            <td>
                <form action="{{ route('links.destroy',$link->id) }}" method="POST">     
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
       </div>
   </div>
</div>    
@endsection