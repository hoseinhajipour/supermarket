@extends('admin.layout.app')

@section('title')
ایجاد دسته بندی جدید
@endsection

@section('content')
<a href="{{route('admin.shop.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.shop.create')}}"
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
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="user_id">کاربر</label>  
            <div class="col-md-4">
                <select id="user_id" name="user_id" class="form-control input-md">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">دسته بندی</label>  
            <div class="col-md-4">
                <select id="category_id" name="category_id" class="form-control input-md">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">توضیحات</label>  
            <div class="col-md-4">
                <textarea id="description" name="description" class="form-control input-md"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="address">آدرس</label>  
            <div class="col-md-4">
                <input id="address" 
                       name="address" 
                       type="text" 
                       placeholder="آدرس" 
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
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="hidden">مخفی</label>  
            <div class="col-md-4">
                <input id="hidden" 
                       name="hidden" 
                       type="checkbox" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="box">
            <input type="submit" 
                   value="ایجاد"
                   class="btn btn-success"/>
        </div>
    </fieldset>
</form>
@include('admin.layout.errors')


@endsection