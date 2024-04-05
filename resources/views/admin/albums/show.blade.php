@extends('layouts.admin.master')
@section('css')

@stop
@section('title')
    Album
@stop

@section('content')

    <h1>pictuers Album : </h1>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <!-- BEGIN CONTENT AREA -->
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <div class="row layout-top-spacing">
                    <div class="row">
                        @foreach($media as $image)
                        <div class="col-xl-4 mb-4">
                                <a href="{{ $image->getUrl() }}" target="_blank">
                                    <!-- Link to open the image in a new tab -->
                                    <div class="card style-6" style="height: 100%;">
                                        <span class="badge badge-danger"></span>
                                        <div class="card-body" style="height: 100%;">
                                            <img src="{{ asset($album->getFirstMediaUrl('cover')) }}" class="card-img-top img-fluid"
                                                style="height: 50%; width: 50%; object-fit: cover;" alt="...">
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-12 mb-4">
                                                    <b>{{ $album->name }}</b>
                                                </div>
                                                <!-- Update and Delete buttons -->
                                                <div class="col-6">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="file" name="image"
                                                            id="imageUpload_{{ $album->id }}" accept="image/*"
                                                            style="display: none;">
                                                        <label for="imageUpload_{{ $album->id }}"
                                                            class="btn btn-primary btn-block">Update Image</label>
                                                    </form>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-danger btn-block">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('js')

@endsection
