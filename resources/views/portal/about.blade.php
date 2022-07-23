@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/03-About-me/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/03-About-me/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if($data['isLogin'])
        <div class="single-post">
            <div class="image-wrapper"><img src="{{ url($data['user']->image) }}" alt="{{ $data['user']->name }}"></div>


            <h3 class="title"><a href="#"><b class="light-color">{{ $data['user']->name }}</b></a></h3>
            <p class="desc">
                {!! $data['user']->content !!}
            </p>

        </div><!-- single-post -->
    @else
    <div class="single-post">
  

        <h3 class="title"><a href="login"><b class="light-color">Silahkan login terlebih dahulu</b></a></h3>
     

    </div><!-- single-post -->
    @endif
@endsection