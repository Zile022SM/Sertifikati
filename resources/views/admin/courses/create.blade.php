@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Create course {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 


@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create course </h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="" enctype="multipart/form-data">
                @csrf 

                <div class="form-group{{$errors->has('duration_srp')?' has-error':''}}">
                    <label>Duration srp</label>
                    <input class="form-control" name="duration_srp" value="{{old('duration_srp')}}" type="text" placeholder="npr 30 casova">
                    @if($errors->has('duration_srp'))
                    <p class="help-block text-danger">{{$errors->first('duration_srp')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('duration_eng')?' has-error':''}}">
                    <label>Duration eng</label>
                    <input class="form-control" name="duration_eng" value="{{old('duration_eng')}}" type="text" placeholder="e.g. 30 classes">
                    @if($errors->has('duration_eng'))
                    <p class="help-block text-danger">{{$errors->first('duration_eng')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('title_srp')?' has-error':''}}">
                    <label>Title serbian</label>
                    <input class="form-control" name="title_srp" value="{{old('title_srp')}}" type="text" placeholder="Enter title_srp">
                    @if($errors->has('title_srp'))
                    <p class="help-block text-danger">{{$errors->first('title_srp')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('title_eng')?' has-error':''}}">
                    <label>Title english</label>
                    <input class="form-control" name="title_eng" value="{{old('title_eng')}}" type="text" placeholder="Enter title_eng">
                    @if($errors->has('title_eng'))
                    <p class="help-block text-danger">{{$errors->first('title_eng')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('class')?' has-error':''}}">
                    <label>Class</label>
                    <select class="form-control" name="class">
                        <option value="">-- Choose class --</option>
                        <option value="children" {{(old('class')=='children')?'selected':''}}>Children</option>
                        <option value="scratch" {{(old('class')=='scratch')?'selected':''}}>Scratch</option>
                        <option value="adults" {{(old('class')=='adults')?'selected':''}}>Adults</option>
                    </select>
                    @if($errors->has('class'))
                    <p class="help-block text-danger">{{$errors->first('class')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('description_srp')?' has-error':''}}">
                    <label>Description srp</label>
                    <textarea class="form-control" name="description_srp">{{old('description_srp')}}</textarea>
                    @if($errors->has('description_srp'))
                    <p class="help-block text-danger">{{$errors->first('description_srp')}}</p>
                    @endif
                </div> 

                <div class="form-group{{$errors->has('description_eng')?' has-error':''}}">
                    <label>Description eng</label>
                    <textarea class="form-control" name="description_eng">{{old('description_eng')}}</textarea>
                    @if($errors->has('description_eng'))
                    <p class="help-block text-danger">{{$errors->first('description_eng')}}</p>
                    @endif
                </div> 

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Save course</button>
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
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
})
</script>
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('description_srp',{
    width: '330'
});
CKEDITOR.replace('description_eng',{
    width: '330'
});
</script>
@endsection

