@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Create new category</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                    <form class="p-0 form-inline p-5 align-content-center 
                    border rounded border-light  justify-content-between bg-white" method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="form-row w-100">
                            <div class="form-group col-2">
                                <label class="" for="name">Title:</label>
                            </div>
                            <div class="form-group col-8">
                                <input class="form-control w-100" name="title" type="text" placeholder="Name..." autofocus>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-2 justify-content-end">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>
                    </form>       
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
