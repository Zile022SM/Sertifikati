@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Create certificate {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create certificate </h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="">
                @csrf 
                
                <div class="form-group{{$errors->has('students_id')?' has-error':''}}">
                    <label>Choose student</label>
                    <select class="form-control" name="students_id">
                        <option value="">-- Choose student --</option>
                        @if(count($students)>0)
                            @foreach($students as $value)
                               <option value="{{$value->id}}" @if(old('students_id')==$value->id) selected  @endif>{{$value->name}} {{$value->surname}} / {{$value->date_of_birth}} / {{strtoupper($value->course)}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('students_id'))
                    <p class="help-block text-danger">{{$errors->first('students_id')}}</p>
                    @endif 
                </div> 
                
                <div class="form-group{{$errors->has('courses_id')?' has-error':''}}">
                    <label>Choose course</label>
                    <select class="form-control" name="courses_id">
                        <option value="">-- Choose course --</option>
                        @if(count($courses)>0)
                            @foreach($courses as $value)
                               <option value="{{$value->id}}" @if(old('courses_id')==$value->id) selected  @endif>{{$value->title_eng}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('courses_id'))
                    <p class="help-block text-danger">{{$errors->first('courses_id')}}</p>
                    @endif 
                </div>
                
                <div class="form-group{{$errors->has('certificate_number')?' has-error':''}}">
                    <label>Course number</label>
                    <input class="form-control" name="certificate_number" value="{{old('number',(rand ( 100000000 , 999999999 )))}}" type="text" placeholder="Enter number">
                    @if($errors->has('certificate_number'))
                    <p class="help-block text-danger">{{$errors->first('certificate_number')}}</p>
                    @endif 
                </div>
                <br>
                <div class="form-group">
                    <label>Cum laude</label>
                    <label class="radio-inline">
                        <input type="radio" name="cum_laude" value="1" @if(old('cum_laude',1)==1) checked  @endif >Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="cum_laude" value="0" @if(old('cum_laude',0)==0) checked  @endif >No
                    </label>
                    @if($errors->has('cum_laude'))
                    <p class="help-block text-danger">{{$errors->first('cum_laude')}}</p>
                    @endif
                </div> 

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Save certificate</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('custom-js') 
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content');
</script>
@endsection

