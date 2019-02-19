@extends('admin.layout.app')

@section('title')
مدیریت رسانه ها
@endsection

@section('content')

<a href="{{route('admin.upload.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list upload</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>آدرس فایل</th> 
            <th>پسوند</th>
            <th>اندازه</th> 
            <th>نوع</th>
            <th>وضعیت</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($uploads as $upload)
        <tr> 
            <th scope="row">{{$upload->id}}</th> 
            <td>{{$upload->user_id}}</td> 
            <td> 
                <a href="{{url('/uploads/'.$upload->src)}}">{{$upload->src}}</a>
            </td> 
            <td>{{$upload->mime}}</td> 
            <td>{{$upload->size}}</td> 
            <td>{{$upload->type}}</td> 
            <td>{{$upload->status}}</td> 
            <td>
                <a href="#" class="btn btn-success">view media</a>
                <a href="{{route('admin.upload.delete',['id'=>$upload->id])}}" class="btn btn-success">delete media</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $uploads])

@endsection