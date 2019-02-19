@extends('admin.layout.app')

@section('title')
مدیریت دسته بندی ها
@endsection

@section('content')

<a href="{{route('admin.wallet.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list Wallet</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>فروشگاه</th> 
            <th>شماره فاکتور</th>
            <th>شماره فاکتور</th> 
            <th>مقدار</th>
            <th>وضعیت</th>
            <th>توضیحات</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($wallets as $wallet)
        <tr> 
            <th scope="row">{{$wallet->id}}</th> 
            <td>{{$wallet->user_id}}</td> 
            <td>{{$wallet->shop_id}}</td> 
            <td>{{$wallet->factor_id}}</td> 
            <td>{{$wallet->payment_id}}</td> 
            <td>{{$wallet->amount}}</td> 
            <td>{{$wallet->status}}</td> 
            <td>{{$wallet->description}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Wallet</a>
                <a href="{{route('admin.wallet.update',['id'=>$wallet->id])}}" class="btn btn-success">edit Wallet</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $wallets])

@endsection