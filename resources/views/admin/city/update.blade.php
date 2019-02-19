@extends('admin.layout.app')

@section('title')
بروز رسانی شهر
@endsection

@section('content')
<h1>update city</h1>

<a href="{{route('admin.city.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.city.update',['id'=>$city->id])}}"
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
                       value="{{$city->name}}">

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
                       value="{{$city->slug}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="province_id">استان</label>  
            <div class="col-md-4">
                <select id="province_id" name="province_id" class="form-control input-md">
                    @foreach($provinces as $province)
                        <option value="{{$province->id}}"
                                @if($province->id === $city->province_id)
                                selected
                                @endif
                                >{{$province->name}}</option>
                    @endforeach
                </select>
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