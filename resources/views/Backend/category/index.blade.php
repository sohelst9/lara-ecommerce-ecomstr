@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Category</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Category</h4>
                        <p class="card-description">
                            <a href="{{ route('category.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ($categories->currentpage() - 1) * $categories->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                <img src="{{ asset($category->image) }}" width="60" height="60">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('category.edit', $category->id) }}" class="text-decoration-none"><i
                                                            class="ti-pencil me-3 edit_btn"></i></a>
                                                    <form action="{{ route('category.destroy', $category->id) }}"
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
