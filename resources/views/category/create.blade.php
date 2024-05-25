@extends('layouts.app') 
@section('content')
<div class="container">
    @foreach($errors->all() as $e)
     <div class="alert alert-danger">{{$e}}</div>
     @endforeach
<form method="post" action="/category">
    @csrf
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required placeholder="Enter Your Name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description">Enter description</label>
        <input type="text" name="description" id="description" required placeholder="Enter description" class="form-control">
    </div>
    <div class="mb-3 text center">
        <button class="btn btn-success">SAVE</button>
    </div>
    
</form>
</div>
@endsection