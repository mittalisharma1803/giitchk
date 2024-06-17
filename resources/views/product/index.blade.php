@extends('layouts.app')

@section('content')
<div class="container">
    @if($gt=Session::get('grt'))
    <div class="alert alert-success text-center">
        {{$gt}}
    </div>
    @endif
    @if($gt=Session::get('err'))
    <div class="alert alert-danger text-center">
        {{$gt}}
    </div>
    @endif
    <a href="/product/create" class="btn btn-success">ADD DATA</a>
    <table class="table table-stripped"> 
    <thead>

        <tr>
            <th>S.No</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Batch Number</th>
            <th>Discount</th>
            <th>Category</th>
            <th>Images</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($data as $info)
        <tr>

            <td>{{$loop->iteration}}</td>
            <td><a href="/product/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">
             
            {{$info['product_name']}}
            </a>
        </td>
        
        
        
            <td>{{$info['product_price']}}</td>
            <td>{{$info['batch_number']}}</td>
            <td>{{$info['discount']}}</td>
            
            <td>
               @foreach ($info['allcategory'] as $cid)
                {{$cid['categoryId']['name'].", "}}
               
               @endforeach
            </td>
            <td>
                <a href ="{{url('product/'.$info->id.'/upload')}}" class="btn btn-success">ADD/View Images</a>            
            </td>
            
            <td>
                <form method="post" action="/product/{{$info['id']}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick=" return confirm('Do you want to delete your data')"> DELETE</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
