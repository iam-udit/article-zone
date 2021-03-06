@extends('layouts.backend.app')

@section('title', 'Add Category')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW CATEGORY
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                                <input type="text" id="category_name" name='name'
                                       class="form-control" value="{{ old('name') }}" required>
                                <label class="form-label">Category Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('description') ? 'focused error' : '' }}">
                                <textarea rows="3" class="form-control" name="description"
                                          id="category_description">{{ old('description') }}</textarea>
                                <label class="form-label">Category Description</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_image">Category Image :</label>
                            <input type="file" accept="image/*"
                                   id="category_image" name='image' class="form-control" required>
                        </div>
                        <a class="btn bg-deep-orange m-t-15 waves-effect" href="{{ route('admin.category.index') }}">
                            BACK
                        </a>

                        <button type="submit" class="btn btn-info m-t-15 waves-effect">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
@endsection

@push('js')

@endpush
