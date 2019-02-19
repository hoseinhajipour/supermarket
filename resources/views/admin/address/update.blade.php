@extends('admin.layout.app')

@section('content')
<h1>update address</h1>

<a href="{{route('admin.address.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.address.update',['id'=>$address->id])}}"
      method="post">
    {{csrf_field()}}
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="province_id">استان</label>  
            <div class="col-md-4">
                <select id="province_id" name="province_id" class="form-control input-md">
                    @foreach($provinces as $province)
                    <option value="{{$province->id}}"
                            @if($province->id === $address->province_id)
                            selected
                            @endif
                            >{{$province->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="city_id">شهر</label>  
            <div class="col-md-4">
                <select id="city_id" name="city_id" class="form-control input-md">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}"
                            @if($city->id === $address->city_id)
                            selected
                            @endif
                            >{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="address">آدرس</label>  
            <div class="col-md-4">
                <textarea id="address" name="address" 
                          class="form-control input-md">{{$address->address}}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="postal_code">کد پستی</label>  
            <div class="col-md-4">
                <input id="postal_code" 
                       name="postal_code" 
                       type="postal_code" 
                       placeholder="کد پستی" 
                       value="{{$address->postal_code}}"
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
                       value="{{$address->phone}}"
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
                       value="{{$address->lat}}"
                       class="form-control input-md">
                <input id="lng" 
                       name="lng" 
                       type="lng" 
                       placeholder="lng" 
                       value="{{$address->lng}}"
                       class="form-control input-md">
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