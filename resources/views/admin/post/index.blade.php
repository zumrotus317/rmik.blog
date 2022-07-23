@extends('admin.app')
@section('content')
    <h3>Posts</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/post/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Headline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td><img width="100px" src="{{ url($post->thumbnail) }}"></td>
            <td>{{($post->is_headline == 1) ? "headline" : "tidak headline"}}</td>
            <td>{{($post->status == 1) ? "publish" : "tidak publish"}}</td>
            <td>
                <a href="{{ url('admin/post/edit/'.$post->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i> Edit</a>
                <a href="{{ url('admin/post/delete/'.$post->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection