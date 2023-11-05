@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Sizes</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Size</h4>
                        <p class="card-description">
                            <a href="{{ route('size.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Size Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $size)
                                        <tr>
                                            <td>{{ ($sizes->currentpage() - 1) * $sizes->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $size->name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('size.edit', $size->id) }}" class="text-decoration-none"><i
                                                            class="ti-pencil edit_btn"></i></a>
                                                    <form action="{{ route('size.destroy', $size->id) }}" method="post">
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
                            {{ $sizes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
