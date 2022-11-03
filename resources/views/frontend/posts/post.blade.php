@extends('templates.front.layout') 

@section('seo-title')
<title>{{ $post->title }}</title>
@endsection 

@section('page-title')
One post
@endsection

@section('custom-css')

@endsection 

@section('content')

<div class="c-content-blog-post-1-view">
    <div class="c-content-blog-post-1">
        @if(!empty($post->img))
        <div class="c-media">
            <div class="c-content-media-2-slider" data-slider="owl">
                <div class="owl-theme c-theme owl-single" data-single-item="true" data-auto-play="4000" data-rtl="false">
                    <div class="item">
                        <div class="c-content-media-2" style="background-image: url({{$post->img}}); min-height: 460px;"> </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="c-title c-font-bold c-font-uppercase">
            <a href="#">{{ $post->title}}</a>
        </div>
        <div class="c-panel c-margin-b-30">
            <div class="c-author">

                <span class="c-font-uppercase">{{ $post->category->name}}</span>
                </a>
            </div>
            <div class="c-date">on
                <span class="c-font-uppercase">{{ $post->created_at }}</span>
            </div>
            <ul class="c-tags c-theme-ul-bg">
                <li>ux</li>
                <li>marketing</li>
                <li>events</li>
            </ul>
            <div class="c-comments">
                <a href="#">
                    <i class="icon-speech"></i> {{count($post->comments)}} comments</a>
            </div>
        </div>
        <div class="c-desc">
            {!!$post->content!!}
        </div>
        <div class="c-comments">

            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Comments({{count($post->comments)}})</h3>
                <div class="c-line-left"></div>
            </div>
            <div class="c-comment-list">
                @if(count($post->comments)>0)
                @foreach($post->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" alt="" src="/templates/front/assets/base/img/content/client-logos/logo{{$loop->iteration}}.jpg"> </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="#" class="c-font-bold">{{$comment->name}}</a> on
                                <span class="c-date">{{$comment->created_at->diffForHumans()}}</span>
                            </h4> 
                            {{$comment->text}} 
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Leave A Comment</h3>
                <div class="c-line-left"></div>
            </div>
            @include('templates.front.partials.errors')
            <form action="{{route('comment-create',['post'=>$post->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" placeholder="Your Name" name="name" value="{{old('name')}}" class="form-control c-square"> </div>
                <div class="form-group">
                    <textarea rows="8" name="text" placeholder="Write comment here ..." class="form-control c-square">{{old('text')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Save comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection 

@section('custom-js')

@endsection