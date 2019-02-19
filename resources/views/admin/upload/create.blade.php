@extends('admin.layout.app')

@section('title')
آپلود
@endsection

@section('content')
<a href="{{route('admin.upload.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.upload.create')}}"
      method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="file">فایل</label>  
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
</form>
@include('admin.layout.errors')


@endsection