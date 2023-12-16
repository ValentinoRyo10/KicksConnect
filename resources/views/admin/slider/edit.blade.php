@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">
                            BACK
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control"><br>
                            <img src="{{ asset("$slider->image") }}" height="100px" width="150px" alt="Slider">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':'' }}> (Checked = Hidden, Unchecked = Visible)
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
