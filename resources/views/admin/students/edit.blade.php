@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Edit student {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 


@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit student {{$student->name}} {{$student->surname}}</h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="">
                @csrf
                <div class="form-group{{$errors->has('name')?' has-error':''}}">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{old('name',$student->name)}}" type="text" placeholder="Enter name">
                    @if($errors->has('name'))
                    <p class="help-block text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="form-group{{$errors->has('surname')?' has-error':''}}">
                    <label>Surname</label>
                    <input class="form-control" name="surname" value="{{old('surname',$student->surname)}}" type="text" placeholder="Enter surname">
                    @if($errors->has('surname'))
                    <p class="help-block text-danger">{{$errors->first('surname')}}</p>
                    @endif
                </div> 
                <div class="form-group{{$errors->has('phone')?' has-error':''}}">
                    <label>Phone</label>
                    <input class="form-control" name="phone" value="{{old('phone',$student->phone)}}" type="text" placeholder="Enter phone">
                    @if($errors->has('phone'))
                    <p class="help-block text-danger">{{$errors->first('phone')}}</p>
                    @endif
                </div>
                <div class="form-group{{$errors->has('email')?' has-error':''}}">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{old('email',$student->email)}}" type="text" placeholder="Enter email">
                    @if($errors->has('email'))
                    <p class="help-block text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>

                <div class="form-group{{$errors->has('date_of_birth')?' has-error':''}}">
                    <label>Date of birth</label>
                    <div class='input-group date'>
                        <input id="date" name="date_of_birth" placeholder="Year / Month / Day" value="{{old('date_of_birth',$student->date_of_birth)}}" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    @if($errors->has('date_of_birth'))
                    <p class="help-block text-danger">{{$errors->first('date_of_birth')}}</p>
                    @endif
                </div>

                <div class="form-group{{$errors->has('course')?' has-error':''}}">
                    <label>Choose course</label>
                    <select class="form-control" name="course">
                        <option value="">-- Choose course --</option>
                        <option value="robotika" {{(old('course',$student->course)=='robotika')?'selected':''}}>Robotika za decu</option>
                        <option value="scratch" {{(old('course',$student->course)=='scratch')?'selected':''}}>Scratch</option>
                        <option value="lego" {{(old('course',$student->course)=='lego')?'selected':''}}>LEGO WeDo 2.0</option>
                        <option value="python_deca" {{(old('course',$student->course)=='python_deca')?'selected':''}}>Python deca</option>
                        <option value="python_deca_algoritmi" {{(old('course',$student->course)=='python_deca_algoritmi')?'selected':''}}>Algoritmi u Python-u deca</option>
                        <option value="arduino" {{(old('course',$student->course)=='arduino')?'selected':''}}>Arduino</option>
                        <option value="web_desing_deca" {{(old('course',$student->course)=='web_desing_deca')?'selected':''}}>Uvod u Web dizajn</option>
                        <option value="sah" {{(old('course',$student->course)=='sah')?'selected':''}}>Šah</option>
                        <option value="baze" {{(old('course',$student->course)=='baze')?'selected':''}}>Baze podataka</option>
                        <option value="web_dizajn_odrasli" {{(old('course',$student->course)=='web_dizajn_odrasli')?'selected':''}}>Web dizajn odrasli</option>
                        <option value="python_odrasli" {{(old('course',$student->course)=='python_odrasli')?'selected':''}}>Python odrasli</option>
                        <option value="excel" {{(old('course',$student->course)=='excel')?'selected':''}}>Napredni Excel</option>
                    </select>
                </div>
                @if($errors->has('course'))
                <p class="help-block text-danger" style='color:red;'>{{$errors->first('course')}}</p>
                @endif

                <div class="form-group{{$errors->has('new')?' has-error':''}}">
                    <label>New or old</label>
                    <select class="form-control" name="new">
                        <option value="">-- Choose new or old--</option>
                        <option value="new" {{(old('new',$student->new)=='new')?'selected':''}}>New</option>
                        <option value="old" {{(old('new', $student->new)=='old')?'selected':''}}>Old</option>
                    </select>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Edit student</button>
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
    var date_input = $('input[name="date_of_birth"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
})
</script>

@endsection

