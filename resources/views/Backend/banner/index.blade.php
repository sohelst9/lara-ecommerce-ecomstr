@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Banner</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Banner</h4>
                        <p class="card-description">
                            <a href="{{ route('banner.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ ($banners->currentpage() - 1) * $banners->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $banner->title }}</td>
                                            <td>
                                                <img src="{{ asset($banner->image) }}" width="60" height="60">
                                            </td>
                                            <td>
                                                @if ($banner->status == 0)
                                                    <a href="{{ route('banner.show', $banner->id) }}" onclick="return confirm('Are You Sure to change This Status?')">Inactive</a>
                                                @else
                                                    <a href="{{ route('banner.show', $banner->id) }}" onclick="return confirm('Are You Sure to change This Status?')">Active</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('banner.edit', $banner->id) }}" class="text-decoration-none"><i
                                                            class="ti-pencil me-3 edit_btn"></i></a>
                                                    <form action="{{ route('banner.destroy', $banner->id) }}"
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
                            {{ $banners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
