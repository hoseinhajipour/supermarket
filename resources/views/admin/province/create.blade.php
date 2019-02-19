@extends('admin.layout.app')

@section('title')
ایجاد استان جدید
@endsection

@section('content')
<a href="{{route('admin.province.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.province.create')}}"
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
                       value="{{old('name')}}"
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
                        value="{{old('slug')}}"
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