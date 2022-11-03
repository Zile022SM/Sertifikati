@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Edit course & teacher {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 

@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit course & teacher </h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="">
                @csrf 
                
                <div class="form-group{{$errors->has('courses_id')?' has-error':''}}">
                    <label>Choose course</label>
                    <select class="form-control" name="courses_id">
                        <option value="0">-- Choose course --</option>
                        @if(count($courses)>0)
                            @foreach($courses as $value)
                               <option value="{{$value->id}}" @if(old('courses_id',$schedule->courses_id)==$value->id) selected  @endif>{{$value->title_eng}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('courses_id'))
                    <p class="help-block text-danger">{{$errors->first('courses_id')}}</p>
                    @endif 
                </div>
                
                <div class="form-group{{$errors->has('teachers_id')?' has-error':''}}">
                    <label>Choose teacher</label>
                    <select class="form-control" name="teachers_id">
                        <option value="0">-- Choose teacher --</option>
                        @if(count($teachers)>0)
                            @foreach($teachers as $value)
                               <option value="{{$value->id}}" @if(old('teachers_id',$schedule->teachers_id)==$value->id) selected  @endif>{{$value->name}} {{$value->surname}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('teachers_id'))
                    <p class="help-block text-danger">{{$errors->first('teachers_id')}}</p>
                    @endif 
                </div> 
                
                <div class="form-group{{$errors->has('start_date')?' has-error':''}}">
                    <label>Start date</label>
                    <div class='input-group date'>
                        <input id="date" name="start_date" placeholder="Year / Month / Day" value="{{old('start_date',$schedule->start_date)}}" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @if($errors->has('start_date'))
                    <p class="help-block text-danger">{{$errors->first('start_date')}}</p>
                    @endif
                </div>
                
                <div class="form-group{{$errors->has('end_date')?' has-error':''}}">
                    <label>End date</label>
                    <div class='input-group date'>
                        <input id="date" name="end_date" placeholder="Year / Month / Day" value="{{old('end_date',$schedule->end_date)}}" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @if($errors->has('end_date'))
                    <p class="help-block text-danger">{{$errors->first('end_date')}}</p>
                    @endif
                </div>
                
                
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Save C&T</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('custom-js') 
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
$(document).ready(function () {
    var date_input = $('input[name="start_date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
})
</script> 

<script>
$(document).ready(function () {
    var date_input = $('input[name="end_date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
})
</script>
@endsection

