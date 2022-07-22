@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">{{ $post->title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="">
                </div>
                <div class="col-12">
                    <div class="card p-0">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table text-nowrap">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$post->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{$post->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{$post->category->title}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <h3>Content</h3>
                    <hr>
                    <div>
                        {!!$post->content!!}
                    </div>
                    <hr>
                    <h3>Preview image</h3>
                    <div class="form-group col-10 w-50">
                        <img class="w-25 border" src="{{ asset('storage/' . $post->preview_image) }}" alt="preview image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <a class="btn btn-warning" href="{{ route('admin.post.edit', $post->id) }}">Edit <i
                            class="fa-solid fa-pencil"></i></a>
                    <form class="d-inline" action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">
                            Delete <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
