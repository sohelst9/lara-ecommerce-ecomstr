@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Add Product Variation</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Add Product Variation
                            </p>
                            <a href="{{ route('product.index') }}">Back</a>
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form class="forms-sample" action="{{ route('product-variation.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="form-group">
                                        <label for="size_id">Size </label>
                                        <select name="size_id" class="form-control" id="size_id">
                                            <option value="">-select-</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="color_id">Color</label>
                                        <select name="color_id" class="form-control" id="color_id">
                                            <option value="">-select-</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity <span class="text-danger">(required)</span></label>
                                        <input type="number" name="quantity" class="form-control" id="quantity"
                                            value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <p class="text-info mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md me-2 mb-3">Submit</button>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <h3>{{ $product->name }}</h3>
                                <p class="text-primary">Total Quantity : {{ $total_quantity }}</p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productVariations as $key => $variation)
                                                <tr>
                                                    <td>{{ $key + 1 }}
                                                    </td>
                                                    <td>{{ $variation->Color->name ?? 'NULL' }}</td>
                                                    <td>{{ $variation->Size->name ?? 'NULL' }}</td>
                                                    <td>{{ $variation->quantity }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            {{-- <a href="{{ route('product-variation.edit', $variation->id) }}"><i
                                                                    class="ti-pencil me-3 edit_btn"></i></a> --}}
                                                            <form
                                                                action="{{ route('product-variation.destroy', $variation->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class=" btn ti-trash delete_btn"
                                                                    onclick="return confirm('Are you sure to delete this Data ?')"></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
