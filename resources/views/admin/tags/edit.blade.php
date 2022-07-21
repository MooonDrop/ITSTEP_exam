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
                        <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">{{ $tag->title }}</li>
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
                                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{$tag->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><input class="form-control" type="text" value="{{ $tag->title }}" name="title" autofocus></td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success" type="submit">Edit</button>
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
