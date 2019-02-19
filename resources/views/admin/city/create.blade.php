@extends('admin.layout.app')

@section('title')
ایجاد شهر جدید
@endsection

@section('content')
<a href="{{route('admin.city.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.city.create')}}"
      method="post">
    {{csrf_field()}}
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="name">نام شهر</label>  
            <div class="col-md-4">
                <input id="name" 
                       name="name" 
                       type="text" 
                       placeholder="نام شهر"
                       value="{{old('name')}}"
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
                       value="{{old('slug')}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="province_id">استان</label>  
            <div class="col-md-4">
                <select id="province_id" name="province_id" class="form-control input-md">
                    @foreach($provinces as $province)
                    <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
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