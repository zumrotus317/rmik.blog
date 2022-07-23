@extends('admin.app')
@section('content')
    <h3>Main Menu</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/mainmenu/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($data as $menu)
        <tr>
            <td>{{$menu->title}}</td>
            <td>{{$menu->category}}</td>
            <td>{{($menu->status == 1) ? "publish" : "tidak publish"}}</td>
            <td>
                <a href="{{ url('admin/mainmenu/edit/'.$menu->id) }}" class="btn btn-primary btn-md"><i class="far fa-edit"></i> Edit</a>
                <a href="{{ url('admin/mainmenu/delete/'.$menu->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection