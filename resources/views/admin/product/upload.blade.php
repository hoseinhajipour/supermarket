@extends('admin.layout.app')

@section('title')
آپلود
@endsection

@section('content')
<h1>آپلود تصویر برای مصحول   {{$product->title}}</h1>
<a href="{{route('admin.product.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.product.upload',['product'=>$product])}}"
      method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="file">انتخاب تصاویر</label>  
            <div class="col-md-4">
                <input id="file" 
                       name="file" 
                       type="file" 
                       placeholder="یک فایل انتخاب کنید"
                       value="{{@old('file')}}"
                       class="form-control input-md">

            </div>
        </div>

        <div class="box">
            <input type="submit" 
                   value="آپلود"
                   class="btn btn-success"/>
        </div>
    </fieldset>
    
    @if(!empty($product->images))
        @foreach(json_decode($product->images) as $key => $value )
        <div class="image">
            <img src="{{ asset('photo/big/'.$value->src) }}" />
            <div class="pin">{{!empty($value->pin)?'pin':''}}</div>
            <a href="{{route('admin.product.image.delete',['product'=>$product->id,'id'=>$key])}}">
            حذف تصویر
            </a>
            <a href="{{route('admin.product.image.pin',['product'=>$product->id,'id'=>$key])}}">
            انتخاب تصویر
            </a>
            <div class="clear"></div>
        </div>
        @endforeach
    @endif
</form>
@include('admin.layout.errors')


@endsection