<aside class="tmd-secondary col-sm-3 col-sm-offset">
    <div class="tmd-widget widget_search">
        <div>
            <form class="bs-form-icon bs-width-1-1" method="get" action="post" role="search">
                <input class="bs-width-1-1" type="search" placeholder="Search" value="" name="s">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </form>
        </div>
    </div>
    <div class="tmd-widget bs-panel widget_recent-posts">
        <h3 class="bs-panel-title">Recent Posts</h3>
        <div class="bs-list">
            <ul>
                <li>阿里云9折优惠码：<strong>并没有╮(╯▽╰)╭</strong></li>
            </ul>
        </div>
    </div>
    <div class="tmd-widget bs-panel widget_recent-comments">
        <h3 class="bs-panel-title">Recent Comments</h3>
        <div class="bs-list">
            <ul>
                <li><a href="#">暂时没有什么</a></li>
                {{--@foreach($articles as $article)--}}
                    {{--<li>--}}
                        {{--@foreach($article->tags as $tag)--}}
                            {{--<a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a>,--}}
                        {{--@endforeach--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            </ul>
        </div>
    </div>
    <div class="tmd-widget bs-panel widget_archives">
        <h3 class="bs-panel-title">Archives</h3>
        <div class="bs-list">
            <ul>
                <li><a href="#">暂时没有什么</a></li>
                {{--@foreach($articles as $article)--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('article/'.$article->id) }}">--}}

                            {{--{{ $article->title }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}

            </ul>
        </div>
    </div>
    <div class="tmd-widget bs-panel widget_categories">
        <h3 class="bs-panel-title">Categories</h3>
        <div class="bs-list">
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ url('category/'.$category->id) }}">
                            @if($category->pid) &nbsp;&nbsp;&nbsp;— @endif
                            {{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>