@extends('admin.layout.app')

@section('title')
ایجاد کاربر جدید
@endsection

@section('content')
<a href="{{route('admin.user.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.user.create')}}"
      method="post">
{{csrf_field()}}
    <fieldset>
     
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">نام و نام خانوادگی</label>  
            <div class="col-md-4">
                <input id="name" 
                       name="name" 
                       type="text" 
                       placeholder="نام و نام خانوادگی" 
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">ایمیل</label>  
            <div class="col-md-4">
                <input id="email" 
                       name="email" 
                       type="text" 
                       placeholder="ایمیل" 
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="mobile">موبایل</label>  
            <div class="col-md-4">
                <input id="mobile" 
                       name="mobile" 
                       type="tel" 
                       placeholder="موبایل" 
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