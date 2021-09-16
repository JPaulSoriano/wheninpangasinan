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
            <div class="card-header bg-primary text-white">Create Category</div>
            <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <lable>Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
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
@endsection