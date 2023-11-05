@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Category</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Category
                            </p>
                            <a href="{{ route('category.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $category->title }}" placeholder="Category Name..">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="5">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                                @if ($category->image)
                                    <img src="{{ asset($category->image) }}" class="mt-2" width="140" height="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="meta_title"
                                    value="{{ $category->meta_title }}" placeholder="Meta Title..">
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="5">{{ $category->meta_keyword }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" class="form-control" id="meta_description" cols="5">{{ $category->meta_description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
