@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Color</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Color</h4>
                        <p class="card-description">
                            <a href="{{ route('color.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ ($colors->currentpage() - 1) * $colors->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $color->name }}</td>
                                            <td class="d-flex align-items-center">
                                                <a href="{{ route('color.edit', $color->id) }}" class="text-decoration-none"><i
                                                        class="ti-pencil edit_btn"></i></a>
                                                <form action="{{ route('color.destroy', $color->id) }}" method="post">
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
                            {{ $colors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
