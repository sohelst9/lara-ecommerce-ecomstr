@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Product --- {{ $product->name }}</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Product
                            </p>
                            <a href="{{ route('product.index') }}">Back</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">(required)</span></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $product->name }}" placeholder="Product Name..">
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
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->title }}</option>
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
                                        @if ($product->thumbnail)
                                            <img src="{{ asset($product->thumbnail) }}" class="mt-3" width="200"
                                                height="150">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="gallery_image">Gallery Image <span class="text-danger">(must be image,
                                                size: 500*450)</span></label>
                                        <input type="file" name="gallery_image[]" multiple class="form-control"
                                            id="gallery_image">
                                        @error('gallery_image')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                        @if ($product->gallery_images)
                                            <div class="Gimage mt-3">
                                                @foreach ($product->gallery_images as $gallery_image)
                                                    <div class="gallery_item">
                                                        <img src="{{ asset($gallery_image->gallery_image) }}"
                                                            class="" width="100" height="80">
                                                        <a class="image_del_button" data-id="{{ $gallery_image->id }}"><i
                                                                class="ti-trash text-danger"></i></a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price <span class="text-danger">(required)</span></label>
                                        <input type="text" name="price" class="form-control" id="price"
                                            value="{{ $product->price }}">
                                        @error('price')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Discount <span class="text-danger">(%)</span></label>
                                        <input type="number" name="discount" class="form-control" id="discount"
                                            value="{{ $product->discount }}">
                                        @error('discount')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="is_feature" class="mb-3">Feature Game?</label>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio1" type="radio" class=""
                                                    {{ $product->is_feature == 1 ? 'checked' : '' }} name="is_feature"
                                                    value="1">
                                                <span class="form-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio2" type="radio" class=""
                                                    {{ $product->is_feature == 0 ? 'checked' : '' }} name="is_feature"
                                                    value="0">
                                                <span class="form-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="just_for_you" class="mb-3">Just For You</label>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio1" type="radio" class=""
                                                    {{ $product->just_for_you == 1 ? 'checked' : '' }} name="just_for_you"
                                                    value="1">
                                                <span class="form-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="form-label">
                                                <input id="radio2" type="radio" class=""
                                                    {{ $product->just_for_you == 0 ? 'checked' : '' }} name="just_for_you"
                                                    value="0">
                                                <span class="form-label">No</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description <span
                                                class="text-danger">(required)</span></label>
                                        <textarea name="description" class="form-control" id="description" cols="5">{{ $product->description }}</textarea>
                                        @error('description')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta_title"
                                            value="{{ $product->meta_title }}" placeholder="Meta Title..">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="5">{{ $product->meta_keyword }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta_description" cols="5">{{ $product->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
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
        //---delete gallery image---
        $(document).ready(function() {
            $('.image_del_button').click(function() {
                if (confirm('Are You Sure Delete This Image?')) {
                    var gallery_id = $(this).data('id');
                    var thisClick = $(this);
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/gallery_image/' + gallery_id,
                        success: function(response) {
                            if (response.status == 200) {
                                alert(response.message);
                                thisClick.closest('.gallery_item').remove();
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection
