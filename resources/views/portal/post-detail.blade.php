@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/02-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="single-post">
    <div class="image-wrapper"><img src="{{ url($posts->thumbnail) }}" alt="Blog Image"></div>

    <div class="icons">
        <div class="left-area">
            <a class="btn caegory-btn" href="#"><b>{{ $posts->category->name }}</b></a>
        </div>
    </div>
    <p class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></p>
    <h3 class="title"><a href="#"><b class="light-color">{{ $posts->title }}</b></a></h3>
    {!! $posts->content !!}

</div>
<!-- single-post -->


@endsection