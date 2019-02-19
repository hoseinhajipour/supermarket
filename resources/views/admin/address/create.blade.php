@extends('admin.layout.app')

@section('title')
ایجادآدرس جدید
@endsection

@section('content')
<a href="{{route('admin.address.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.address.create')}}"
      method="post">
    {{csrf_field()}}
    <fieldset>
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
        <div class="form-group">
            <label class="col-md-4 control-label" for="city_id">شهر</label>  
            <div class="col-md-4">
                <select id="city_id" name="city_id" class="form-control input-md">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="address">آدرس</label>  
            <div class="col-md-4">
                <textarea id="address" name="address" 
                          class="form-control input-md">{{old('address')}}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="postal_code">کد پستی</label>  
            <div class="col-md-4">
                <input id="postal_code" 
                       name="postal_code" 
                       type="postal_code" 
                       placeholder="کد پستی" 
                       value="{{old('postal_code')}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="phone">تلفن</label>  
            <div class="col-md-4">
                <input id="phone" 
                       name="phone" 
                       type="phone" 
                       placeholder="تلفن" 
                       value="{{old('phone')}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" >موقعیت مکانی</label>  
            <div class="col-md-4">
                <input id="lat" 
                       name="lat" 
                       type="lat" 
                       placeholder="lat" 
                       value="{{old('lat')}}"
                       class="form-control input-md">
                <input id="lng" 
                       name="lng" 
                       type="lng" 
                       placeholder="lng" 
                       value="{{old('lng')}}"
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