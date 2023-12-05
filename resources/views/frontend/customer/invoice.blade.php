@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Customer Invoice">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Customer Invoice">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Customer Invoice" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Customer Invoice" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Customer Invoice" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Customer Invoice" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Customer Invoice</title>
@endsection

@section('main_content')
    <style>
        /* Customize your styles here */
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #3498db;
            color: #fff;
        }

        .customer-info,
        .invoice-info {
            margin-bottom: 20px;
        }

        .product-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .product-table th,
        .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .total-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #ecf0f1;
            font-weight: bold;
        }
    </style>
    <section class="my-account mt-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice_container">
                                <!-- Invoice Header -->
                                <div class="invoice-header">
                                    <div>
                                        <h3>ECOMSTR</h3>
                                    </div>
                                    <div>
                                        <p>Date: <span id="date"></span></p>
                                        <p>Time: <span id="time"></span></p>
                                    </div>
                                </div>

                                <!-- Customer Info and Invoice Info -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="customer-info">
                                        <h4>Customer Information</h4>
                                        <p>Customer Name: {{ $order->User->name }}</p>
                                        <p>Customer Number: {{ $order->phone }}</p>
                                        <p>Address: {{ $order->address }}</p>
                                        <!-- Add more customer info fields as needed -->
                                    </div>
                                    <div class="invoice-info mt-3">
                                        <h4>Invoice Information</h4>
                                        <p>Order: {{ $order->trnx_id }}</p>
                                        <p>Order Status:
                                            @if ($order->delivery_status == 0)
                                                Pending
                                            @elseif ($order->delivery_status == 1)
                                                Processing
                                            @elseif ($order->delivery_status == 2)
                                                Delivered
                                            @elseif ($order->delivery_status == 3)
                                                Canceled
                                            @else
                                            @endif
                                        </p>
                                        <p>Date:
                                            @php
                                                $stringDate = $order->created_at; // Your string date
                                                $date = \Carbon\Carbon::parse($stringDate);
                                                echo $formattedDate = $date->format('j F, Y');
                                            @endphp
                                        </p>
                                        <p>Payment Method: {{ $order->payment_type }}</p>
                                        <!-- Add more invoice info fields as needed -->
                                    </div>
                                </div>

                                <!-- Product Table -->
                                <div class="table-responsive">
                                    <table class="table product-table">
                                        <thead>
                                            <tr class="">
                                                <th>Product</th>
                                                <th>Image</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->OrderProductDetail as $product)
                                                <tr>
                                                    <td>{{ $product->Product->name }}</td>
                                                    <td>
                                                        <img src="{{ asset($product->Product->thumbnail) }}" width="50"
                                                            height="50" alt="">
                                                    </td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>&#2547;{{ $product->product_price }}</td>
                                                    <td>&#2547;{{ $product->product_price * $product->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Total Section -->
                                <div class="total-section">
                                    <span>Sub Total:</span>
                                    <span>&#2547; {{ number_format($order->sub_total, 2) }}</span>
                                </div>
                                <div class="total-section">
                                    <span>Delivery Charge:</span>
                                    <span>&#2547; {{ $order->delivery_charge }}</span>
                                </div>
                                <hr>
                                <div class="total-section">
                                    <span>Total:</span>
                                    <span>&#2547; {{ number_format($order->total, 2) }}</span>
                                </div>
                                <div class="print_button mt-3">
                                    <button class="btn btn-danger">Download</button>
                                    <button onclick="window.print()" class="btn btn-secondary">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // JavaScript to display current date and time
        function updateDateTime() {
            const now = new Date();
            document.getElementById('date').innerText = now.toDateString();
            document.getElementById('time').innerText = now.toLocaleTimeString();
        }

        setInterval(updateDateTime, 1000);
        updateDateTime(); // Initial update
    </script>
@endsection
