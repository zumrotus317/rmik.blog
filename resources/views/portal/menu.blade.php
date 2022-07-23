@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/03-About-me/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-About-me/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="single-post">
    <h3 class="title"><a href="#"><b class="light-color">{{ $data['menu']->title }}</b></a></h3>
    <p class="desc">
        @if($data['menu']->category == 'content')
        {!! $data['menu']->content !!}
        @endif

        @if($data['menu']->category == 'file')
        <embed src="{{ url($data['menu']->file) }}" width="100%" height="500px" />
        @endif

    </p>

</div><!-- single-post -->

@endsection