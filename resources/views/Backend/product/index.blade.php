@extends('Backend.app')
@section('dash_title')
    <title>
        Lara Vue E-commerce | All Products</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">All Products</h4>
                            <form action="{{ route('product.index') }}">
                                <input type="search" name="product_search" placeholder="Product Or Category"
                                    class="form-control">
                            </form>
                        </div>
                        <p class="card-description">
                            <a href="{{ route('product.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Variation</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Total Quantity</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ($products->currentpage() - 1) * $products->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>
                                                <a href="{{ route('product-variation.show', $product->id) }}">Add</a>
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->Category->title ?? 'Null' }}</td>
                                            <td>
                                                <img src="{{ asset($product->thumbnail) }}" width="60" height="60">
                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }} @if ($product->discount)
                                                    ({{ $product->discount }}%)
                                                @endif
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="text-decoration-none"><i class="ti-pencil me-3 edit_btn"></i></a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" btn ti-trash delete_btn"
                                                        onclick="return confirm('Are you sure to delete this Data ?')"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
