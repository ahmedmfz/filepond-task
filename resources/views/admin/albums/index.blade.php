@extends('layouts.admin.master')
@section('css')

@stop
@section('title')
    Add New Album
@stop

@section('content')
    <h1>Add New Album</h1>
    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                <hr>
                <h3>all Albums</h3>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-md-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center fs-5">#</th>
                                <th scope="col" class="text-center fs-5">Name</th>
                                <th scope="col" class="text-center fs-5 text-info">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                            <tr>
                                <td class="text-center fs-5"> {{ $loop->iteration }}</td>
                                <td class="text-center fs-5">{{ $album->name }}</td>
                                <td class="text-center fs-5">
                                    <div>
                                        <a href="{{route('album.show', $album->id)}}" class="btn btn-lg btn-danger d-inline-block">Show <i class="bi bi-pencil-square"></i></a>
                                        <a href="{{route('album.add_pic', $album->id)}}" class="btn btn-lg btn-danger d-inline-block">Add pic <i class="bi bi-pencil-square"></i></a>
                                        <a href="" class="btn btn-lg btn-danger d-inline-block">Edit <i class="bi bi-pencil-square"></i></a>
                                        <form action="" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
