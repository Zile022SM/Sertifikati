@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Edit admin user {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit admin user - {{$user->name}} </h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="" enctype="multypart-form-data">
                @csrf
                <div class="form-group{{$errors->has('name')?' has-error':''}}">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{old('name',$user->name)}}" type="text" placeholder="Enter name">
                    @if($errors->has('name'))
                    <p class="help-block text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="form-group{{$errors->has('address')?' has-error':''}}">
                    <label>Address</label>
                    <input class="form-control" name="address" value="{{old('address',$user->address)}}" type="text" placeholder="Enter address">
                    @if($errors->has('address'))
                    <p class="help-block text-danger">{{$errors->first('address')}}</p>
                    @endif
                </div> 
                <div class="form-group{{$errors->has('phone')?' has-error':''}}">
                    <label>Phone</label>
                    <input class="form-control" name="phone" value="{{old('phone',$user->phone)}}" type="text" placeholder="Enter phone">
                    @if($errors->has('phone'))
                    <p class="help-block text-danger">{{$errors->first('phone')}}</p>
                    @endif
                </div>
                <div class="form-group{{$errors->has('email')?' has-error':''}}">
                    <label>Email</label>
                    <input disabled class="form-control" name="email" value="{{old('email',$user->email)}}" type="text" placeholder="Enter email">
                    @if($errors->has('email'))
                    <p class="help-block text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group{{$errors->has('role')?' has-error':''}}{{(auth()->user()->role=='moderator')? ' hide':''}}">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="">-- Choose role --</option>
                        <option value="administrator" {{(old('role',$user->role)=='administrator')?'selected':''}}>Administrator</option>
                        <option value="moderator" {{(old('role',$user->role)=='moderator')?'selected':''}}>Moderator</option>
                    </select>
                </div>
                <!--
                <div class="form-group">
                    <label>File input</label>
                    <input type="file">
                </div>
                -->
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Edit user</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('custom-js') 

@endsection

