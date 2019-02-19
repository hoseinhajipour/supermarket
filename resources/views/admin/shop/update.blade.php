@extends('admin.layout.app')
@section('بروز رسانی فروشگاه')
@endsection
@section('content')
<h1>بروز رسانی فروشگاه</h1>

<a href="{{route('admin.shop.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.shop.update',['id'=>$shop->id])}}"
      method="post">
    {{csrf_field()}}
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="title">نام فروشگاه</label>  
            <div class="col-md-4">
                <input id="title" 
                       name="title" 
                       type="text" 
                       placeholder="نام" 
                       class="form-control input-md"
                       value="{{$shop->title}}">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="user_id">کاربر</label>  
            <div class="col-md-4">
                <select id="user_id" name="user_id" class="form-control input-md" >
                    @foreach ($users as $user)
                    <option value="{{$user->id}}"
                            @if ($user->id === $shop->user_id)
                            selected
                            @endif
                            >{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">دسته بندی</label>  
            <div class="col-md-4">
                <select id="category_id" name="category_id" class="form-control input-md">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                            @if ($category->id === $shop->category_id)
                            selected
                            @endif
                            >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">توضیحات</label>  
            <div class="col-md-4">
                <textarea id="description" name="description" class="form-control input-md">{{$shop->description}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="address">آدرس</label>  
            <div class="col-md-4">
                <input id="address" 
                       name="address" 
                       type="text" 
                       placeholder="آدرس" 
                       value="{{$shop->address}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="phone">تلفن</label>  
            <div class="col-md-4">
                <input id="phone" 
                       name="phone" 
                       type="tel" 
                       placeholder="تلفن" 
                       value="{{$shop->phone}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="sort">مرتب سازی</label>  
            <div class="col-md-4">
                <input id="sort" 
                       name="sort" 
                       type="number" 
                       placeholder="مرتب سازی" 
                       value="{{$shop->sort}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="logo">لوگو</label>  
            <div class="col-md-4">
                <input id="logo" 
                       name="logo" 
                       type="text" 
                       placeholder="لوگو" 
                       value="{{$shop->logo}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="domain">دامنه</label>  
            <div class="col-md-4">
                <input id="domain" 
                       name="domain" 
                       type="text" 
                       placeholder="دامنه" 
                       value="{{$shop->domain}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="type">نوع</label>  
            <div class="col-md-4">
                <select id="type" name="type" class="form-control input-md">
                    <option name="seller" value="seller" >فروشنده</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="approved">تایید</label>  
            <div class="col-md-4">
                <input id="approved" 
                       name="approved" 
                       type="checkbox" 
                       @if ($shop->approved === 1)
                       checked
                       @endif
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="hidden">مخفی</label>  
            <div class="col-md-4">
                <input id="hidden" 
                       name="hidden" 
                       type="checkbox" 
                       @if ($shop->hidden === 1)
                       checked
                       @endif
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="expire">تاریخ اعتبار</label>  
            <div class="col-md-4">
                <input id="expire" 
                       name="expire" 
                       type="datetime"
                       value="{{$shop->expire}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="box">
            <input type="submit" 
                   value="بروز رسانی"
                   class="btn btn-success"/>
        </div>
    </fieldset>
</form>
@include('admin.layout.errors')
@endsection