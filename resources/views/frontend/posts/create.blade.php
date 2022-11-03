@extends('templates.front.layout') 

@section('seo-title')
<title>Create new post</title>
@endsection 

@section('page-title')
Create new post
@endsection

@section('custom-css')

@endsection 

@section('content')

<div class="c-content-blog-post-1-view">
    <div class="c-content-blog-post-1">
        <div class="c-comments">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Post details</h3>
                <div class="c-line-left"></div>
            </div>
            @include('templates.front.partials.errors')
            
            <form action="{{route('post-create')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    @if(count($categories)>0)
                    <select name="category_id" class="form-control c-square">
                        <option value="">--Izaberi kategoriju--</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" @if(old('category_id')== $category->id) selected  @endif >{{$category->name}}</option>
                          @endforeach
                        
                    </select>
                    @endif
                </div>
                @if ($errors->has('category'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('category') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <input type="text" placeholder="Title" name="title" value="{{old('title')}}" class="form-control c-square"> 
                </div>
                @if ($errors->has('title'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('title') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <input type="text" placeholder="Image url" name="img" value="{{old('img')}}" class="form-control c-square">
                </div>
                @if ($errors->has('img'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('img') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <textarea rows="8" name="content" class="form-control c-square">{!!old('content')!!}</textarea>
                </div>
                @if ($errors->has('content'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('content') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Save post</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection 

@section('custom-js')
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('content');
</script>
@endsection