@extends('admin.layout.app')

@section('title')
مدیریت دسته بندی ها
@endsection

@section('content')

<a href="{{route('admin.city.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list city</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام</th> 
            <th>slug</th> 
            <th>استان</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($cities as $city)
        <tr> 
            <th scope="row">{{$city->id}}</th> 
            <td>{{$city->name}}</td> 
            <td>{{$city->slug}}</td> 
            <td>{{$city->province_id}}</td> 
            <td>
                <a href="#" class="btn btn-success">view city</a>
                <a href="{{route('admin.city.update',['id'=>$city->id])}}" class="btn btn-success">edit city's</a>
                <a href="{{route('admin.city.delete',['city'=>$city])}}" class="btn btn-success">delete city</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $cities])

@endsection