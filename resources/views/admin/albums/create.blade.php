@extends('layouts.admin.master')
@section('css')

@stop
@section('title')
    Add New Album
@stop

@section('content')
    <h1>Add New Album</h1>
                <form autocomplete="off" method="POST" enctype="multipart/form-data" action="{{ route('album.store') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput" class="fs-5">Type Name Album</label>
                        <input type="text" placeholder="type Name Album" required name="name" value="{{ old('name') }}"
                            class="form-control" id="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{-- <br>
                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput" class="fs-5">Upload Images</label>
                            <input type="file" multiple name="images[]" class="form-control" id="images">
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
