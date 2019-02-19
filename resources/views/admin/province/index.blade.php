@extends('admin.layout.app')

@section('title')
مدیریت استان ها
@endsection

@section('content')

<a href="{{route('admin.province.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list province</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام</th> 
            <th>slug</th> 
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($provinces as $province)
        <tr> 
            <th scope="row">{{$province->id}}</th> 
            <td>{{$province->name}}</td> 
            <td>{{$province->slug}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Province</a>
                <a href="{{route('admin.province.update',['id'=>$province->id])}}" class="btn btn-success">edit Province</a>
                <a href="{{route('admin.province.delete',['province'=>$province])}}" class="btn btn-success">delete Province</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $provinces])

@endsection