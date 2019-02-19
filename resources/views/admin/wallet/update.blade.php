@extends('admin.layout.app')
@section('content')
<h1>update wallet</h1>

<a href="{{route('admin.wallet.index')}}" class="btn btn-success">بازگشت</a>
<form class="form-horizontal" 
      action="{{route('admin.wallet.update',['id'=>$wallet->id])}}"
      method="post">
    {{csrf_field()}}
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">توضیحات</label>  
            <div class="col-md-4">
                <textarea id="description" name="description" class="form-control input-md">{{$wallet->description}}</textarea>
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