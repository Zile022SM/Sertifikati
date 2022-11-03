@extends('templates.admin.master.layout') 

@section('seo-title') 
<title>Create knowledge base post {{ config('app.seo-separator')}}{{ config('app.name')}}</title>
@endsection 

@section('custom-css') 

@endsection 


@section('content') 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit post - {{$post->seo_title_h1}}</h1>
    </div>   
    <!-- /.col-lg-12 -->

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="" enctype="multipart/form-data">
                @csrf 

                <div class="form-group{{$errors->has('seo_title')?' has-error':''}}">
                    <label>Seo title</label>
                    <input class="form-control" name="seo_title" value="{{old('seo_title',$post->seo_title)}}" type="text" placeholder="Enter seo_title">
                    @if($errors->has('seo_title'))
                    <p class="help-block text-danger">{{$errors->first('seo_title')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('meta_description')?' has-error':''}}">
                    <label>Meta description</label>
                    <input class="form-control" name="meta_description" value="{{old('meta_description',$post->meta_description)}}" type="text" placeholder="Enter meta_description">
                    @if($errors->has('meta_description'))
                    <p class="help-block text-danger">{{$errors->first('meta_description')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('seo_title_h1')?' has-error':''}}">
                    <label>Seo title h1</label>
                    <input class="form-control" name="seo_title_h1" value="{{old('seo_title_h1',$post->seo_title_h1)}}" type="text" placeholder="Enter seo_title_h1">
                    @if($errors->has('seo_title_h1'))
                    <p class="help-block text-danger">{{$errors->first('seo_title_h1')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('alt_attribute')?' has-error':''}}">
                    <label>Alt attribute</label>
                    <input class="form-control" name="alt_attribute" value="{{old('alt_attribute',$post->alt_attribute)}}" type="text" placeholder="Enter alt_attribute">
                    @if($errors->has('alt_attribute'))
                    <p class="help-block text-danger">{{$errors->first('alt_attribute')}}</p>
                    @endif
                </div> 

                <div class="form-group{{$errors->has('type')?' has-error':''}}">
                    <label>Choose image or video type</label>
                    <select class="form-control" name="type">
                        <option value="">-- Choose image or video type --</option>
                        <option value="image" {{(old('type',$post->type)=='image')?'selected':''}}>Image</option>
                        <option value="video" {{(old('type',$post->type)=='video')?'selected':''}}>Video</option>
                    </select>
                    @if($errors->has('type'))
                    <p class="help-block text-danger">{{$errors->first('type')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('video')?' has-error':''}}">
                    <label>Video link</label>
                    <input class="form-control" name="video" value="{{old('video',$post->video)}}" type="text" placeholder="Enter youtube video link">
                    @if($errors->has('video'))
                    <p class="help-block text-danger">{{$errors->first('video')}}</p>
                    @endif 
                </div>

                <div class="form-group{{$errors->has('image')?' has-error':''}}">
                    <label>Current image</label>
                    <br>
                    <img src="{{(!empty($post->getImage('m')) && $post->type !='video')?$post->getImage('m'):"/uploads/baza/no-photo.jpg"}}" class="img-thumbnail" alt="" width="304" height="236" >
                </div>

                <div class="form-group{{$errors->has('image')?' has-error':''}}">
                    <label>Image</label>
                    <input type="file" name="image">
                    @if($errors->has('image'))
                    <p class="help-block text-danger">{{$errors->first('image')}}</p>
                    @endif
                </div>

                <div class="form-group{{$errors->has('content')?' has-error':''}}">
                    <label>Description</label>
                    <textarea id="my-editor" class="form-control" name="content">{{old('content',$post->description)}}</textarea>
                    @if($errors->has('content'))
                    <p class="help-block text-danger">{{$errors->first('content')}}</p>
                    @endif
                </div> 

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary pull-right">Edit post</button>
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
<script src="/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};
</script>

<script>
    CKEDITOR.replace('my-editor', options);
</script>
<script>
    CKEDITOR.stylesSet.add('my_styles', [
        // Inline styles.
        {name: 'CSS Style', element: 'p', attributes: {'class': 'p-custom-post'}},
        {name: 'H2 class', element: 'h2', attributes: {'class': 'blog-details-headline h2-custom-post'}}
    ]);
</script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
@endsection

