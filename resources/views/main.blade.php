@extends('index')
@section('title','Homepage')
    
@section('contant')


    <div class="container">
        <div class="row">
        @if ($posts->count())
        @foreach ($posts as $index => $post)
            <div class="col-xs-6">
                <article class="post-item">

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="post.html">{{ $post->title }}</a></h2>
                            <p>{{ $post->body }}</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> February 12, 2016</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="post.html">Continue Reading  &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
            @endforeach
            @endif

            
        </div>
    </div>
@endsection
