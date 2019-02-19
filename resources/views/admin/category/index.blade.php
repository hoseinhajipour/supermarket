@extends('admin.layout.app')

@section('title')
مدیریت دسته بندی ها
@endsection

@section('content')

<a href="{{route('admin.category.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list category</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام</th> 
            <th>slug</th> 
            <th>والد</th>
            <th>مرتب سازی</th> 
            <th>آیکون</th>
            <th>نوع</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($categories as $category)
        <tr> 
            <th scope="row">{{$category->id}}</th> 
            <td>{{$category->name}}</td> 
            <td>{{$category->slug}}</td> 
            <td>{{$category->parent_id}}</td> 
            <td>{{$category->sort}}</td> 
            <td>{{$category->icon}}</td> 
            <td>{{$category->type}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Category</a>
                <a href="{{route('admin.category.update',['id'=>$category->id])}}" class="btn btn-success">edit Category</a>
                <a href="{{route('admin.category.delete',['user'=>$category])}}" class="btn btn-success">delete Category</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $categories])

@endsection