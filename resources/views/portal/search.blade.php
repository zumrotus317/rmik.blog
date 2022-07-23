@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/03-About-me/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-About-me/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="recomend-area">
    <h4 class="title"><b class="light-color">Posts</b></h4>
    <div class="row">

        @foreach ($data['posts'] as $posts)
        <div class="col-md-6">

            <div class="recomend">
                <div class="post-image"><img src="{{ url($posts->thumbnail) }}" alt="Post Image"></div>

                <div class="post-info">
                    <a class="btn category-btn" href="{{ url('category/'.$posts->category->id) }}">{{$posts->category->name}}</a>
                    <h5 class="title"><a href="{{ url('post-detail/'.$posts->id) }}"><b class="light-color">{{ substr($posts->title, 0, 30).(strlen($posts->title) > 30 ? "..." : "") }}</b></a></h5>
                    <h6 class="date"><em>{{date('D, M Y', strtotime($posts->created_at))}}</em></h6>
                    {!! substr($posts->content, 0, 30).(strlen($posts->content) > 30 ? "..." : "") !!}
                </div><!-- post-info -->
            </div><!-- recomend -->

        </div><!-- col-md-6 -->
        @endforeach

    </div><!-- row -->
</div><!-- recomend-area -->
@endsection