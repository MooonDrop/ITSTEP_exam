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
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                            <form class="p-0 form-inline p-5 align-content-center 
                    border rounded border-light  justify-content-between bg-white" method="POST"
                                enctype="multipart/form-data" action="{{ route('admin.user.update', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-row w-100 mb-3">
                                    <div class="form-group col-2">
                                        <label class="" for="name">Login:</label>
                                    </div>
                                    <div class="form-group col-10">
                                        <input class="form-control w-100" name="name" type="text"
                                            placeholder="Login...">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row w-100 mb-3">
                                    <div class="form-group col-2">
                                        <label class="" for="name">Email:</label>
                                    </div>
                                    <div class="form-group col-10">
                                        <input class="form-control w-100" name="email" type="email"
                                            placeholder="Email...">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row w-100 mt-3">
                                   <input type="hidden" name="user_id" value="{{ $user->id
                                 }}">
                                </div>
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
