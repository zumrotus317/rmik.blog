@extends('admin.app')
@section('content')
    <h3>Create Main Menu</h3>
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
        <form action="{{ url('admin/mainmenu/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="Title">Title</label>
            <input type="text" name="title" class="form-control">
            <label for="parent">Parent</label>
            <select class="form-control" name="parent" id="parent">
                <option value="0">-</option>
                @foreach($parent as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
            </select>
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option>Select Category</option>
                <option value="link">link</option>
                <option value="content">content</option>
                <option value="file">file</option>
            </select>
            <div id="contents">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" name="content" rows="10" cols="50"></textarea>
            </div>
            <div id="files">
                <label for="file">File</label>
                <input id="file" type="file" name="file" class="form-control">
            </div>
            <div id="links">
                <label for="URL">URL</label>
                <input id="link" type="text" name="url" class="form-control">
            </div>
            <label for="Order">Order</label>
            <input type="number" name="order" class="form-control">
            <label for="Status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select>
            <br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/mainmenu') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('#contents').hide();
        $('#links').hide();
        $('#files').hide();

        $('#category').on('change', function() {
            var data = $(this).val();
            $('#contents').hide();
            $('#links').hide();
            $('#files').hide();
            $('#'+data+'s').show();
        });
    });
</script>
<script src="{{url('assets/ckeditor/ckeditor.js')}}"></script>
<script>
   var content = document.getElementById("content");
     CKEDITOR.replace(content,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@endsection