@extends('admin.layout.app')

@section('title')
ایجاد دسته بندی جدید
@endsection

@section('content')
<a href="{{route('admin.wallet.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.wallet.create')}}"
      method="post">
{{csrf_field()}}
    <fieldset>
     
        <div class="form-group">
            <label class="col-md-4 control-label" for="user_id">کد کاربر:</label>  
            <div class="col-md-4">
                <input id="user_id" 
                       name="user_id" 
                       type="number" 
                       placeholder="کد کاربر"
                       value="{{old('user_id')}}"
                       class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="shop_id">کد فروشگاه:</label>  
            <div class="col-md-4">
                <input id="shop_id" 
                       name="shop_id" 
                       type="number" 
                       placeholder="کد فروشگاه" 
                       value="{{old('shop_id')}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="price">مقدار</label>  
            <div class="col-md-4">
                <input id="price" 
                       name="price" 
                       type="number" 
                       placeholder="مقدار"
                       value="{{old('price')}}"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">توضیحات</label>  
            <div class="col-md-4">
                <textarea id="description" name="description" class="form-control input-md">{{old('description')}}</textarea>
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