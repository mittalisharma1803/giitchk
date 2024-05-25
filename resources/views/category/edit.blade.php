@extends('layouts.app') 
@section('content')
<div class="container">
<form method="post" action="/category/{{$info['id']}}">
    @csrf
   @method('patch')
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required placeholder="Enter Your Name" class="form-control" value="{{$info['name']}}">
    </div>
    <div class="mb-3">
        <label for="description">Enter description</label>
        <input type="text" name="description" id="description" required placeholder="Enter description" class="form-control" value="{{$info['description']}}">>
    </div>
    <div class="mb-3 text center">
        <button class="btn btn-success">SAVE</button>
    </div>
    
</form>
</div>
@endsection