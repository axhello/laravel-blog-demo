@extends('home')

@section('content')
    <div class="bs-grid row" xmlns="http://www.w3.org/1999/html">
            <div class="tmd-primary col-sm-9">
                    <div class="tmd-content">
                    @if(!empty($articles))
                    @foreach($articles as $article)
                        <article id="8" class="bs-article bs-panel-box">
                            <header>
                                <h2 class="bs-article-title">
                                    <a href="{{url('article/'.$article->id)}}" title="{{$article->title}}">{{$article->title}}</a>
                                </h2>
                                <ul class="bs-article-meta bs-subnav bs-subnav-line">
                                    <li>Posted on <a href="{{url('category/'.$article->category['id'])}}">{{$article->category['name']}}</a></li>
                                    <li>更新于 <a href="#">{{ $article->updated_at->diffForHumans() }}</a></li>
                                    <li><a href="#"><span class="ds-thread-count" data-thread-key="{{ $article->id }}" data-count-type="comments"></span></a></li>
                                    <li>
                                        @foreach($article->tags as $tag)
                                            <a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a>&nbsp;
                                        @endforeach
                                    </li>
                                </ul>
                            </header>
                            <div>
                                <div class="tmd-article-content">
                                    <p>{!! str_limit(EndaEditor::MarkDecode($article->content),250) !!}</p>

                                    <a href="{{url('article/'.$article->id)}}" class="more-link">Continue reading</a>

                                </div>
                            </div>
                        </article>
                    @endforeach
                    @endif
                    <nav>
                        {!! $articles->render() !!} 
                    </nav>
                </div>
            </div>
@endsection