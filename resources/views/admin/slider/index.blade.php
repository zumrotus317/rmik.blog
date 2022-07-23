@extends('admin.app')
@section('content')
    <h3>Slider</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/slider/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $slide)
        <tr>
            <td>{{$slide->title}}</td>
            <td><img width="100px" src="{{ url($slide->image) }}"></td>
            <td>
                <a href="{{ url('admin/slider/edit/'.$slide->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i> Edit</a>
                <a href="{{ url('admin/slider/delete/'.$slide->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection