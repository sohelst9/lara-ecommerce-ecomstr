@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Create Product</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                New Product
                            </p>
                            <a href="{{ route('product.index') }}">Back</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('product.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">(required)</span></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ old('name') }}" placeholder="Product Name..">
                                        @error('name')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category <span
                                                class="text-danger">(required)</span></label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option value="">-select-</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail Image <span class="text-danger">(required, size:
                                                400*400)</span></label>
                                        <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                                        @error('thumbnail')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gallery_image">Gallery Image <span class="text-danger">(must be image,
                                                size: 500*450)</span></label>
                                        <input type="file" name="gallery_image[]" multiple class="form-control"
                                            id="gallery_image">
                                        @error('gallery_image')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price <span class="text-danger">(required)</span></label>
                                        <input type="text" name="price" class="form-control" id="price"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Discount <span class="text-danger">(%)</span></label>
                                        <input type="number" name="discount" class="form-control" id="discount"
                                            value="{{ old('discount') }}">
                                        @error('discount')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="is_feature" class="mb-3">Feature Game?</label>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio1" type="radio" class="" name="is_feature"
                                                    value="1">
                                                <span class="form-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio2" type="radio" class="" checked name="is_feature"
                                                    value="0">
                                                <span class="form-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="just_for_you" class="mb-3">Just For You</label>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio1" type="radio" class="" name="just_for_you"
                                                    value="1">
                                                <span class="form-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio2" type="radio" class="" checked name="just_for_you"
                                                    value="0">
                                                <span class="form-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description <span
                                                class="text-danger">(required)</span></label>
                                        <textarea name="description" class="form-control" id="description" cols="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta_title"
                                            value="{{ old('meta_title') }}" placeholder="Meta Title..">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="5">{{ old('meta_keyword') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta_description" cols="5">{{ old('meta_description') }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        tinymce.init({
            selector: '#description'
        });
        tinymce.init({
            selector: '#meta_description'
        });
    </script>
@endsection
