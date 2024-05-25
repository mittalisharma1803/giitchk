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
    <a href="/category/create" class="btn btn-success">ADD DATA</a>
    <table class="table table-stripped"> 
    <thead>

        <tr>
            <th>S.No</th>
            <th>name</th>
            <th>description</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($data as $info)
        <tr>

            <td>{{$loop->iteration}}</td>
            <td><a href="/category/{{$info['id']}}/edit" class="link-offset-2 link-underline link-underline-opacity-0" title="Edit">
             
            {{$info['name']}}
            </a>
        </td>
            <td>{{$info['description']}}</td>
            <td>
                <form method="post" action="/category/{{$info['id']}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick=" return confirm('do you want to delete your data')"> DELETE</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
