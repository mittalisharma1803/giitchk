@extends('layouts.app') 
@section('content')
<div class=" mb-5">
  <h1 style="color:red" class="text-center"> THE FLAWLESS STORE</h1>
</div>
<style>
    .dgrid{
        border:1px solid #ddd;
        padding: 5px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    }
</style>
<div class="container">
    @foreach($errors->all() as $e)
     <div class="alert alert-danger">{{$e}}</div>
     @endforeach
<form method="post" action="/product/" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name">Select category:</label>
        <div class="dgrid">
         @foreach($cdata as $cinfo)
         <div>
         <input type="checkbox"  id="c{{$cinfo['id']}}" name="category_id[]" value="{{$cinfo['id']}}">
         <label for="c{{$cinfo['id']}}">
         {{$cinfo['name']}}
        </label>
    
        </div>
         @endforeach
        </div>
        
    </div>
    <div>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="{{old('name')}}" id="product_name" placeholder="Enter Product Name" class="form-control" required>
    </div>
    <div>
        <label for="product_price">Product Price:</label>
        <input type="integer" name="product_price" value="{{old('product_price')}}"id="product_price" placeholder="Enter Product Price" class="form-control" required>
    </div>
    <div>
        <label for="batch_number">Batch Number:</label>
        <input type="text" name="batch_number" value="{{old('batch_number')}}"id="batch_number" placeholder="Enter Batch Number" class="form-control">
    </div>
    <div>
        <label for="discount">Discount:</label>
        <input type="text" name="discount" value="{{old('discount')}}"id="discount" placeholder="Enter Discount" class="form-control">
    </div>
    <div>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
    </div>
    <div class="mb-3 text center">
        <button class="btn btn-success">SAVE</button>
    </div>
    
</form>
</div>
@endsection