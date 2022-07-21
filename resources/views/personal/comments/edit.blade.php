@extends('personal.layouts.main')

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
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Your Comments</a></li>
                        <li class="breadcrumb-item active">Comments</li>
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
                <div class="col-12">
                    <div class="card p-0">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table text-nowrap">
                                <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$comment->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Message</td>
                                            <td><textarea class="form-control" name="message" id="" cols="30" rows="10" autofocus>{{$comment->message}}</textarea></td>
                                        </tr>
                                        @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
