@extends('admin.layout.app')

@section('title')
مدیریت سبد های خرید
@endsection

@section('content')
<h1>list cart</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>کاربر</th> 
            <th>فروشگاه</th> 
            <th>شماره فاکتور</th> 
            <th>محصول</th> 
            <th>قیمت</th> 
            <th>قیمت با تخفیف</th>
            <th>قیمت نهایی</th>
            <th>تعداد</th> 
            <th>وضعیت</th> 
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($carts as $cart)
        <tr> 
            <th scope="row">{{$cart->id}}</th> 
            <td>{{$cart->user_id}}</td> 
            <td>{{$cart->shop_id}}</td> 
            <td>{{$cart->factor_id}}</td> 
            <td>{{$cart->price}}</td> 
            <td>{{$cart->discount_price}}</td> 
            <td>{{$cart->final_price}}</td> 
            <td>{{$cart->count}}</td> 
            <td>{{$cart->status}}</td> 
            <td>
                <a href="#" class="btn btn-success">view Cart</a>
                <a href="{{route('admin.cart.delete',['cart'=>$cart])}}" class="btn btn-success">delete Factor</a>

            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $carts])

@endsection