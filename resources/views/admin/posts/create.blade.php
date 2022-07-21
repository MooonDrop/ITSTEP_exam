@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Create new post</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
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
                enctype="multipart/form-data" action="{{ route('admin.post.store') }}">
                @csrf
                <div class="form-row w-100">
                    <div class="form-group col-2">
                        <label class="" for="name">Prewiew image:</label>
                    </div>
                    <div class="form-group col-10 w-50">
                        <div class="input-group w-100">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="preview_image" autofocus>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="title">Title:</label>
                    </div>
                    <div class="form-group col-10 w-50">
                        <input class="form-control w-100" name="title" type="text" placeholder="Name..." value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="content">Content:</label>
                    </div>
                    <div class="form-group col-10 w-100">
                        <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="category_id">Category:</label>
                    </div>
                    <div class="form-group col-10 w-50">
                        <select class="form-control w-100" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->title }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row w-100 mt-3">
                    <div class="form-group col-2">
                        <label class="" for="tag_id">Tags:</label>
                    </div>
                    <div class="form-group col-10 w-50">
                        <select class="select2" name="tag_ids[]" multiple data-placeholder="Select a State" 
                        style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="mt-3 btn btn-primary" type="submit">Create</button>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
