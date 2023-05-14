@extends('admin.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Postingan Baru</h1>
        </div>

        <a href="/admin/postingan" class="btn btn-primary">Kembali</a>

        <br><br>

        <div class="col-10">
            <form action="/admin/store_post" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="1" name="author_id">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" required name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt</label>
                    <textarea type="text" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" required name="excerpt">{{old('excerpt')}}</textarea>
                    @error('excerpt')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" required name="content">{{old('content')}}</textarea>
                    @error('content')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection      