@extends('admin.layout.app')

@section('title')
ایجاد دسته بندی جدید
@endsection

@section('content')
<a href="{{route('admin.category.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.category.create')}}"
      method="post">
{{csrf_field()}}
    <fieldset>
     
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">نام</label>  
            <div class="col-md-4">
                <input id="name" 
                       name="name" 
                       type="text" 
                       placeholder="نام" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">slug</label>  
            <div class="col-md-4">
                <input id="slug" 
                       name="slug" 
                       type="text" 
                       placeholder="slug" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="parent_id">والد</label>  
            <div class="col-md-4">
                <input id="parent_id" 
                       name="parent_id" 
                       type="number" 
                       placeholder="والد" 
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
            <label class="col-md-4 control-label" for="icon">آیکون</label>  
            <div class="col-md-4">
                <input id="icon" 
                       name="icon" 
                       type="text" 
                       placeholder="آیکون" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="type">نوع</label>  
            <div class="col-md-4">
                <input id="type" 
                       name="type" 
                       type="text" 
                       placeholder="نوع" 
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