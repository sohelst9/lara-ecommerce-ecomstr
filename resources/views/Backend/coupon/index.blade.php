@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Coupon</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Coupon</h4>
                        <p class="card-description">
                            <a href="{{ route('coupon.create') }}" class="btn btn-md btn-primary">Add New</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Coupon Name</th>
                                        <th>Validity</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key=>$coupon)
                                        <tr>
                                            <td>{{ $key + 1 }}
                                            </td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->validity }}</td>
                                            <td>{{ $coupon->discount }}</td>
                                            <td>
                                                @if($coupon->status == 1)
                                                <a href="{{ route('coupon.show', $coupon->id) }}">Active</a>
                                                @else
                                                <a href="{{ route('coupon.show', $coupon->id) }}">Deactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('coupon.edit', $coupon->id) }}" class="text-decoration-none"><i
                                                            class="ti-pencil edit_btn"></i></a>
                                                    <form action="{{ route('coupon.destroy', $coupon->id) }}" method="post">
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
@endsection
