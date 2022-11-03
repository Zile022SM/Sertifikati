@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Change password {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change password for user {{$user->name}} </h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="" enctype="multypart-form-data">
                @csrf
                <div class="form-group{{$errors->has('password')?' has-error':''}}">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Enter password">
                    @if($errors->has('password'))
                    <p class="help-block text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div> 
                <div class="form-group{{$errors->has('password_confirmation')?' has-error':''}}">
                    <label>Confirm password</label>
                    <input class="form-control" name="password_confirmation" type="password" placeholder="Enter confirm password">
                    @if($errors->has('password_confirmation'))
                    <p class="help-block text-danger">{{$errors->first('password_confirmation')}}</p>
                    @endif
                </div> 
                <!--
                <div class="form-group">
                    <label>File input</label>
                    <input type="file">
                </div>
                -->
                <div class="form-group text-right">
                    <a style="margin-left: 10px;" href="{{route('users-welcome')}}" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Change password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('custom-js') 

@endsection

