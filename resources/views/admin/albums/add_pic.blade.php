@extends('layouts.admin.master')

@push('css')
  <link href="{{ asset('admin/assets/css/file-pond.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/css/file-pond-image-perview.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/assets/css/file-pond-image-edit.css') }}" rel="stylesheet" />  
@endpush

@section('title')
Add New Pic / Album {{ $album->name }}
@stop

@section('content')
<h1>Add New Pic / Album {{ $album->name }} </h1>
<form autocomplete="off" method="POST" enctype="multipart/form-data" action="{{ route('album.store') }}">
    @csrf

    <div class="form-group mb-4">
            <label for="formGroupExampleInput" class="fs-5">Name</label>
            <input type="text" placeholder="type Name Album" required name="name" value="{{ old('name') }}" class="form-control" id="name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    <br>
    <div class="form-group mb-4">
            <label for="formGroupExampleInput" class="fs-5">Upload Images</label>
            <input type="file" 
                            required
                            class="filepond"
                            name="filepond" 
                            data-max-file-size="2MB">
            @error('images')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

    <button class="btn btn-primary mt-3" type="submit">Save</button>
</form>
</div>
</div>
</div>
@endsection


@push('js')
      <script src="{{ asset('admin/assets/js/file-pond-image-edit.js') }}" ></script>
      <script src="{{ asset('admin/assets/js/file-pond-exif.js') }}" ></script>
      <script src="{{ asset('admin/assets/js/file-pond-validate-size.js') }}" ></script>
      <script src="{{ asset('admin/assets/js/file-pond-image-perview.js') }}" ></script>
      <script src="{{ asset('admin/assets/js/file-pond.js') }}" ></script>
        
      <script>
          FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
          );

          const pond = FilePond.create(
            document.querySelector('.filepond')
          );

          pond.setOptions({
              server: {
                  url: '{{ url('/') }}',
                  
                  process: {
                      url: '/upload_temp/?',
                      method: 'POST',
                      ondata: (formData) => {
                          formData.append('_token', '{{ csrf_token() }}');
                          return formData;
                      },
                  },

                  revert : {
                      url: '/delete_temp/?file=',
                      method: 'GET',
                  },
              },
          });
      </script>
@endpush
