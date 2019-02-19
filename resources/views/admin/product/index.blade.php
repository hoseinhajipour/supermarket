@extends('admin.layout.app')

@section('title')
مدیریت محصولات
@endsection

@section('content')

<a href="{{route('admin.product.create')}}" class="btn btn-success">افزودن جدید</a>
<h1>list product</h1>


<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام</th> 
            <th>توضیحات</th> 
            <th>تصاویر</th>
            <th>قیمت</th>
            <th>قیمت با تخفیف</th> 
            <th>دسته بندی</th>
            <th>موجودی انبار</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($products as $product)
        <tr> 
            <th scope="row">{{$product->id}}</th> 
            <td>{{$product->title}}</td> 
            <td>{{$product->description}}</td> 
            <td><a href="{{route('admin.product.upload',['product'=>$product])}}">تصاویر</a></td> 
            <td>{{$product->price}}</td> 
            <td>{{$product->discount}}</td> 
            <td>{{$product->category_id}}</td> 
            <td>{{$product->inventory}}</td> 
            <td>
                <a href="#" class="btn btn-success">view product</a>
                <a href="{{route('admin.product.update',['id'=>$product->id])}}" class="btn btn-success">edit product</a>
                <a href="{{route('admin.product.delete',['product'=>$product])}}" class="btn btn-success">delete product</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>

@include('pagination.default', ['paginator' => $products])
@endsection