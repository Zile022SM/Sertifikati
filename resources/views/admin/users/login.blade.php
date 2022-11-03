@extends('templates.admin.login.layout')

@section('seo-title') 
<title>Login {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 

@section('content') 

<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Please Sign In</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="post" action="{{route('users-login')}}">
            {{ csrf_field() }}
            <fieldset>
                <div class="form-group{{$errors->has('email')?'has-error':''}}">
                    <input value="{{old('email')}} "class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                    @if($errors->has('email'))
                    <div class="alert alert-danger" role="danger">
                        <strong>{{$errors->first('email')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group{{$errors->has('password')?'has-error':''}}">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    @if($errors->has('password'))
                    <div class="alert alert-danger" role="danger">
                        <strong>{{$errors->first('password')}}</strong>
                    </div>
                    @endif
                </div>

                <!-- Change this to a button or input when using this as a form -->
                <button  class="btn btn-lg btn-success btn-block">Login</button>
            </fieldset>
        </form>
    </div>
</div>
<div class="alert alert-{{ session()->get('message')['type']}} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    {{ session()->get('message')['message']}}
</div>
@endsection

@section('custom-js') 

@endsection