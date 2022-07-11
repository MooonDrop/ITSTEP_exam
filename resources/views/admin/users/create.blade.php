@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Create new user</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
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
                    border rounded border-light  justify-content-between bg-white" method="POST"
                action="{{ route('admin.user.store') }}">
                @csrf
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="name">Login:</label>
                    </div>
                    <div class="form-group col-10">
                        <input class="form-control w-100" name="name" type="text" placeholder="Login...">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="name">Email:</label>
                    </div>
                    <div class="form-group col-10">
                        <input class="form-control w-100" name="email" type="email" placeholder="Email...">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="role_id">User role:</label>
                    </div>
                    <div class="form-group col-10 w-50">
                        <select class="form-control w-100" name="role">
                            @foreach($roles as $id => $role)
                            <option value="{{ $id }}"
                                {{ $id == old('role_id') ? 'selected' : '' }}>{{ $role }}
                            </option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Create</button>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
