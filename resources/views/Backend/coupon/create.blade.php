@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | New Coupon</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                New Coupon
                            </p>
                            <a href="{{ route('coupon.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                                    placeholder="Coupon Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validity">Name</label>
                                <input type="date" name="validity" class="form-control" id="validity" value="{{ old('validity') }}">
                                @error('validity')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount <span class="text-danger">(%)</span></label>
                                <input type="text" name="discount" class="form-control" id="discount" value="{{ old('discount') }}">
                                @error('discount')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
