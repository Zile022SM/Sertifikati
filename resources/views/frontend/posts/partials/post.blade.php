<div class="c-content-blog-post-1">
    @if(!empty($one->img))
        <div class="c-media">
            <div class="c-content-media-2-slider" data-slider="owl">
                <div class="owl-theme c-theme owl-single" data-single-item="true" data-auto-play="4000" data-rtl="false">
                    <div class="item">
                        <div class="c-content-media-2" style="background-image: url({{$one->img}}); min-height: 460px;"> </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="c-title c-font-bold c-font-uppercase">
        <a href="{{route('post',['one'=>$one->id])}}">{{$loop->iteration}}. {{$one->title}}</a>
    </div>
    <div class="c-desc"> {!!$one->content!!}
        <a href="#">read more...</a>
    </div>
    <div class="c-panel">
        <div class="c-author">
            <a href="#">
                <span class="c-font-uppercase">{{$one->category->name}}</span>
            </a>
        </div>
        <div class="c-date">on
            <span class="c-font-uppercase">{{$one->created_at}}</span>
        </div>
        <ul class="c-tags c-theme-ul-bg">
            <li>ux</li>
            <li>marketing</li>
            <li>events</li>
        </ul>
        <div class="c-comments">
            <a href="#">
                <i class="icon-speech"></i> {{count($one->comments)}} comments</a>
        </div>
    </div>
</div>