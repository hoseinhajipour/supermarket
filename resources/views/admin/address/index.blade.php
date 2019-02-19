@extends('admin.layout.app')

@section('title')
آدرس ها
@endsection

@section('content')

<a href="{{route('admin.address.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list address</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>استان</th> 
            <th>شهر</th>
            <th>آدرس</th> 
            <th>کد پستی</th>
            <th>تلفن</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($addresss as $address)
        <tr> 
            <th scope="row">{{$address->id}}</th> 
            <td>{{$address->user_id}}</td> 
            <td>{{$address->province_id}}</td> 
            <td>{{$address->city_id}}</td> 
            <td>{{$address->address}}</td> 
            <td>{{$address->postal_code}}</td> 
            <td>{{$address->phone}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Address</a>
                <a href="{{route('admin.address.update',['id'=>$address->id])}}" class="btn btn-success">edit Address</a>
                <a href="{{route('admin.address.delete',['address'=>$address])}}" class="btn btn-success">delete Address</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $addresss])

@endsection