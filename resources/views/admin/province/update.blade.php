@extends('admin.layout.app')

@section('content')
<h1>update province</h1>

<a href="{{route('admin.province.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.province.update',['id'=>$province->id])}}"
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
                       class="form-control input-md"
                       value="{{$province->name}}">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="slug">slug</label>  
            <div class="col-md-4">
                <input id="slug" 
                       name="slug" 
                       type="text" 
                       placeholder="slug" 
                       class="form-control input-md"
                       value="{{$province->slug}}">
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