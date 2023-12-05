@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | All Orders</title>
@endsection
@section('das_content')
    <style>
        /* Custom styles for the dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
        }

        .custom-dropdown button {
            border: none;
            padding: 7px;
            cursor: pointer;
            /* color: black; */
        }

        .custom-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 2000000000;
        }

        .custom-dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .custom-dropdown-content a:hover {
            background-color: #ddd;
        }

        .custom-dropdown:hover .custom-dropdown-content {
            display: block;
        }

        @media (max-width: 576px) {

            /* Responsive styling */
            .custom-dropdown-content {
                width: 100%;
                box-shadow: none;
            }
        }
    </style>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Code</th>
                                        <th>Number Of Product</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $order->trnx_id }}</td>
                                            <td>
                                                {{ $order->OrderProductDetail->count() }}
                                            </td>
                                            <td>{{ $order->User->name }}</td>
                                            <td>{{ $order->total }} TK</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>
                                                @if ($order->payment_status == 0)
                                                    <a onclick="return confirm('are you sure This user payment has been paid in full')"
                                                        href="{{ route('payment.status.change', $order->id) }}"><span
                                                            class="badge bg-secondary rounded-pill">Unpaid</span></a>
                                                @elseif ($order->payment_status == 1)
                                                    <a><span class="badge bg-primary rounded-pill">Paid</span></a>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <div class="custom-dropdown">
                                                    @if ($order->delivery_status == 0)
                                                        <button class="btn btn-secondary">Pending</button>
                                                    @elseif ($order->delivery_status == 1)
                                                        <button class="btn btn-info">Processing</button>
                                                    @elseif ($order->delivery_status == 2)
                                                        <button class="btn btn-primary">Delivered</button>
                                                    @elseif ($order->delivery_status == 3)
                                                        <button class="btn btn-danger">Canceled</button>
                                                    @else
                                                    @endif
                                                    <div class="custom-dropdown-content">
                                                        @if ($order->delivery_status == 0)
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="processing">Processing</a>
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="canceled">Canceled</a>
                                                        @elseif ($order->delivery_status == 1)
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="delivered">Delivered</a>
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="canceled">Canceled</a>

                                                        @elseif ($order->delivery_status == 3)
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="pending">Pending</a>
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="processing">Processing</a>
                                                            <a class="update_status" href="#" data-order-id="{{ $order->id }}"
                                                                data-status="delivered">Delivery</a>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ route('order.invoice', $order->trnx_id) }}" class="me-2 text-info" title="invoice"><i
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
@section('script')
    <script>
        $(document).ready(function() {
            $('.update_status').click(function(e) {
                e.preventDefault();
                var orderId = $(this).data('order-id');
                var status = $(this).data('status');
                $.ajax({
                    type: 'POST',
                    url: '/admin/orders/delivery/status',
                    data: {
                        order_id: orderId,
                        status: status
                    },
                    success: function(data) {
                        alert(data);
                        location.reload();
                        // Update the UI as needed
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
