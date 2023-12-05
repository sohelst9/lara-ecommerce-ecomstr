@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Customer</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Customer</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Profile</th>
                                        <th>Order Complete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ ($customers->currentpage() - 1) * $customers->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>
                                                <img src="{{ asset($customer->image) }}" width="60" height="60">
                                            </td>
                                            <td>{{ $customer->Order->count() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
