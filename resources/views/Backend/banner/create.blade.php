@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Create Banner</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                New Banner
                            </p>
                            <a href="{{ route('banner.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}"
                                    placeholder="Banner Title..">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{ old('sub_title') }}"
                                    placeholder="Bannner Sub Title..">
                                @error('sub_title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image <span class="text-danger">(1920*600)</span></label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
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
