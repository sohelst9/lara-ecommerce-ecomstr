@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Customer Order">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Customer Order">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Customer Order" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Customer Order</title>
@endsection

@section('main_content')
    <section class="my-account pt-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.customer.inc.sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="recent-orders bg-white rounded py-5">
                        <h6 class="mb-4 px-4">Your Orders</h6>
                        <div class="table-responsive">
                            <table class="order-history-table table">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Code</th>
                                        <th>Placed On</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    @foreach ($userOrders as $order)
                                        <tr>
                                            <td>{{ ($userOrders->currentpage() - 1) * $userOrders->perpage() + $loop->index + 1 }}</td>
                                            <td>{{ $order->trnx_id }}</td>
                                            <td>
                                                @php
                                                    $stringDate = $order->created_at; // Your string date
                                                    $date = \Carbon\Carbon::parse($stringDate);
                                                    echo $formattedDate = $date->format('j F, Y');
                                                @endphp
                                            </td>
                                            <td>{{ $order->OrderProductDetail->count() }}</td>
                                            <td class="text-secondary">{{ $order->total }} TK</td>
                                            <td>
                                                @if ($order->delivery_status == 0)
                                                    <span class="badge bg-secondary">Pending</span>
                                                @elseif ($order->delivery_status == 1)
                                                    <span class="badge bg-info">Processing</span>
                                                @elseif ($order->delivery_status == 2)
                                                    <span class="badge bg-primary">Delivered</span>
                                                @elseif ($order->delivery_status == 3)
                                                    <span class="badge bg-danger">Canceled</span>
                                                @else
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('order.track', $order->trnx_id) }}"
                                                    class="view-invoice fs-xs me-2" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Track My Order"><i
                                                        class="fas fa-truck text-dark"></i></a>

                                                <a href="{{ route('customer.order.invoice', $order->trnx_id) }}"
                                                    class="view-invoice fs-xs" target="_blank" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="View Details"><i
                                                        class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $userOrders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
