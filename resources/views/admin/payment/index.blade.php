@extends('admin.layout.app')

@section('title')
تراکنش ها
@endsection

@section('content')
<h1>list factor</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>مبلغ</th> 
            <th>شماره فاکتور</th>
            <th>کد پرداخت</th> 
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($payments as $payment)
        <tr> 
            <th scope="row">{{$factor->id}}</th> 
            <td>{{$factor->user_id}}</td> 
            <td>{{$factor->price}}</td> 
            <td>{{$factor->factor_id}}</td> 
            <td>{{$factor->refid}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Factor</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $payments])

@endsection