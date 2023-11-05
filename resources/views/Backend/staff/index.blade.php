@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Staffs</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Staffs</h4>
                        <p class="card-description">
                            <a href="{{ route('staff.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td>{{ ($staffs->currentpage() - 1) * $staffs->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $staff->name }}</td>
                                            <td>{{ $staff->email }}</td>
                                            <td>{{ $staff->role }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('staff.edit', $staff->id) }}"
                                                        class="text-decoration-none"><i
                                                            class="ti-pencil me-3 edit_btn"></i></a>
                                                    <form action="{{ route('staff.destroy', $staff->id) }}" method="post">
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
                            {{ $staffs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
