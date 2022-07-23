@extends('admin.app')
@section('content')
    <h3>Edit Slider</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/slider/edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$data->title}}" class="form-control">
            <label for="url">URL</label>
            <input type="text" name="url" value="{{$data->url}}" class="form-control">
            <label for="order">Order</label>
            <input type="text" name="order" value="{{$data->order}}" class="form-control">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category">
                @foreach ($category as $cat)
                <option value="{{$cat->id}}" {{ ($cat->id == $data->category_id) ? 'selected' : '' }}>{{$cat->name}}</option>
                @endforeach
            </select>
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1" {{ (1 == $data->status) ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ (0 == $data->status) ? 'selected' : '' }}>Tidak Publish</option>
            </select>
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control"><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Edit Data">
            <a href="{{ url('admin/category') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection