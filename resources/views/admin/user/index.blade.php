@extends('admin.layout.app')

@section('title')
مدیریت کاربران
@endsection

@section('content')
<a href="{{route('admin.user.create')}}" class="btn btn-success">افزودن جدید</a>

<h1>User List</h1>
<hr/>
<table class="table table-bordered"> 
    <thead> 
        <tr> 
            <th>#</th> 
            <th>نام و نام خانوادگی</th> 
            <th>ایمیل</th> 
            <th>موبایل</th>
            <th>تایید موبایل</th> 
            <th>تایید ایمیل</th>
            <th>کد فعالسازی</th>
            <th>وضعیت</th>
            <th>تنظیمات</th>
        </tr> 
    </thead> 
    <tbody> 
        @foreach ($users as $user)
        <tr> 
            <th scope="row">{{$user->id}}</th> 
            <td>{{$user->name}}</td> 
            <td>{{$user->email}}</td> 
            <td>{{$user->mobile}}</td> 
            <td>{{$user->check_mobile}}</td> 
            <td>{{$user->check_email}}</td> 
            <td>{{$user->code}}</td> 
            <td>{{$user->susspend}}</td> 
            <td>
                <a href="#" class="btn btn-success">view user</a>
                <a href="{{route('admin.user.update',['id'=>$user->id])}}" class="btn btn-success">edit user</a>
                <a href="{{route('admin.user.delete',['user'=>$user])}}" class="btn btn-success">delete user</a>
                <a href="{{route('admin.user.susspend',['user'=>$user])}}" class="btn btn-success">susspend user</a>
            </td> 
        </tr> 
        @endforeach

    </tbody> 
</table>
@include('pagination.default', ['paginator' => $users])
@endsection