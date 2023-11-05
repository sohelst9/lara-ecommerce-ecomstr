@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Product Variation</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 m-auto grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Product Variation
                            </p>
                            <a href="{{ route('product-variation.show', $variation->product_id) }}">Back</a>
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="forms-sample" action="{{ route('product-variation.update', $variation->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="size_id">Product Name </label>
                                        <input type="text" value="{{ $product->name }}" class="form-control" readonly>
                                        <input type="hidden" value="{{ $product->id }}"name="product_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="size_id">Size </label>
                                        <select name="size_id" class="form-control" id="size_id">
                                            <option value="">-select-</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}" {{ $variation->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="color_id">Color</label>
                                        <select name="color_id" class="form-control" id="color_id">
                                            <option value="">-select-</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}" {{ $variation->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity <span class="text-danger">(required)</span></label>
                                        <input type="number" name="quantity" class="form-control" id="quantity"
                                            value="{{ $variation->quantity }}">
                                        @error('quantity')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
