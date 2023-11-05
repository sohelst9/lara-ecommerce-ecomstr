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
                                        <th>Order Code</th>
                                        <th>Number Of Product</th>
                                        <th>Customer</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Amount</th>
                                        <th>Delevery Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ '559i69fdf' }}</td>
                                            <td>{{ '3' }}</td>
                                            <td>{{ 'sohel rana' }}</td>
                                            <td>{{ 'Cash on Delevery' }}</td>
                                            <td>Paid</td>
                                            <td>350.00 TK</td>
                                            <td>Delivered</td>
                                            <td>
                                                <a href="" class="me-2 text-primary" title="view"><i
                                                        class="ti-eye"></i></a>
                                                <a href="" class="me-2 text-info" title="invoice"><i
                                                        class="ti-file"></i></a>
                                                <a href=""><i class="ti-trash text-danger" title="delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
