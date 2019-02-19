@extends('admin.layout.app')

@section('title')
مدیریت فاکتور ها
@endsection

@section('content')
<h1>list factor</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>قیمت نهایی</th> 
            <th>هزینه ارسال</th>
            <th>وضعیت</th> 
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($factors as $factor)
        <tr> 
            <th scope="row">{{$factor->id}}</th> 
            <td>{{$factor->user_id}}</td> 
            <td>{{$factor->final_price}}</td> 
            <td>{{$factor->shipping_cost}}</td> 
            <td>{{$factor->status}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Factor</a>
                <a href="{{route('admin.factor.update',['id'=>$factor->id])}}" class="btn btn-success">edit Factor</a>
              
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $factors])

@endsection