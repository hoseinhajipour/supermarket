@extends('admin.layout.app')
@section('title')
محصول جدید
@endsection
@section('content')
<h1>محصول جدید</h1>

<a href="{{route('admin.product.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.product.create')}}"
      method="post">
    {{csrf_field()}}
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="title">نام</label>  
            <div class="col-md-4">
                <input id="title" 
                       name="title" 
                       type="text" 
                       placeholder="نام" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">توضیحات</label>  
            <div class="col-md-4">
                <input id="description" 
                       name="description" 
                       type="text" 
                       placeholder="توضیحات" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="slug">slug</label>  
            <div class="col-md-4">
                <input id="slug" 
                       name="slug" 
                       type="text" 
                       placeholder="slug" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="price">قیمت</label>  
            <div class="col-md-4">
                <input id="price" 
                       name="price" 
                       type="number" 
                       placeholder="قیمت" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="discount">قیمت با تخفیف</label>  
            <div class="col-md-4">
                <input id="discount" 
                       name="discount" 
                       type="number" 
                       placeholder="قیمت با تخفیف" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="inventory">موجودی</label>  
            <div class="col-md-4">
                <input id="inventory" 
                       name="inventory" 
                       type="number" 
                       placeholder="موجودی" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">دسته بندی</label>  
            <div class="col-md-4">
                <input id="category_id" 
                       name="category_id" 
                       type="number" 
                       placeholder="دسته بندی" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="images">عکس ها</label>  
            <div class="col-md-4">
                <input id="images" 
                       name="images" 
                       type="text" 
                       placeholder="عکس ها" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="status">وضعیت</label>  
            <div class="col-md-4">
                <input id="status" 
                       name="status" 
                       type="number" 
                       placeholder="وضعیت" 
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