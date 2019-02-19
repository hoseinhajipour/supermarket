@extends('admin.layout.app')

@section('title')
مدیریت دسته بندی ها
@endsection

@section('content')

<a href="{{route('admin.shop.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list shop</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام</th> 
            <th>وضعیت</th> 
            <th>مخفی</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($shops as $shop)
        <tr> 
            <th scope="row">{{$shop->id}}</th> 
            <td> <img src="{{$shop->logo}}"> {{$shop->title}}</td> 
            <td>{{$shop->approved}}</td> 
            <td>{{$shop->hidden}}</td> 
            <td>
                <a href="#" class="btn btn-success">view shop</a>
                <a href="{{route('admin.shop.update',['id'=>$shop->id])}}" class="btn btn-success">edit shop</a>
                <a href="{{route('admin.shop.delete',['user'=>$shop])}}" class="btn btn-success">delete shop</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $shops])

@endsection