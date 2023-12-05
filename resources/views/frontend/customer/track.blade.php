@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Customer Order Track">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Customer Order Track">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Customer Order Track" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Customer Order Track" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Customer Order Track" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Customer Order Track" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Customer Order Track</title>
@endsection

@section('main_content')
    <section class="my-account pt-6">
        <div class="container">
            {{-- @include('frontend.customer.inc.profile-info') --}}

            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.customer.inc.sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="order-tracking-wrap bg-white rounded py-5 px-4">
                        <h6 class="mb-4">Order Tracking</h6>
                        <form class="search-form d-flex align-items-center mb-5 justify-content-center" action="#">
                            <div class="input-group mb-3 d-flex justify-content-center">
                                <input type="text" class="w-50" placeholder="Code" name="code"
                                    value="{{ $order->trnx_id }}">
                                {{-- <button type="submit" class="btn btn-secondary px-3"><i
                                        class="fa-solid fa-magnifying-glass"></i></button> --}}
                            </div>
                        </form>
                        <ol id="progress-bar">
                            <li class="fs-xs tt-step  tt-step-done">
                                Order Placed</li>
                            <li
                                class="fs-xs tt-step 
                            @if ($order->delivery_status == 0) tt-step-done
                            @elseif($order->delivery_status == 1)
                            tt-step-done
                            @elseif($order->delivery_status == 2)
                            tt-step-done @endif
                            ">
                                Pending</li>
                            <li
                                class="fs-xs tt-step @if ($order->delivery_status == 1) tt-step-done
                                @elseif($order->delivery_status == 2)
                                tt-step-done @endif">
                                Processing</li>
                            <li class="fs-xs tt-step @if ($order->delivery_status == 2) tt-step-done @endif">
                                Delivered</li>
                        </ol>
                        <div class="table-responsive-md mt-5">
                            <table class="table table-bordered fs-xs">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->OrderProductDetail as $product)
                                        <tr>
                                            <td style="width: 200px">{{ $product->Product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>&#2547;{{ $product->product_price }}</td>
                                            <td>&#2547;{{ $product->product_price * $product->quantity }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
