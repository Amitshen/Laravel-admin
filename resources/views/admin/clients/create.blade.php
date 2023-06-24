@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} Client
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.clients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{isset($category)?$category->id:''}}">
            <div class="row">
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($category) ? $category->name : '') }}" required>
                    @if($errors->has('name'))
                    <p class="help-block text-danger">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>

                
                <div class="form-group col-md-6 {{ $errors->has('profile_image') ? 'has-error' : '' }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Image</label>
                            <input type="file" id="profile_image" name="profile_image" class="form-control">
                            @if($errors->has('profile_image'))
                            <p class="help-block text-danger">
                                {{ $errors->first('profile_image') }}
                            </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group col-md-6">
                            @if($category->profile_image )
                            <img height="50" width="50" src="{{ url('client/images'.'/'.$category->profile_image)}}"
                                @endif </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="email">Description</label>
                    <input type="text" id="description" name="description" class="form-control"
                        value="{{ old('description', isset($category) ? $category->description : '') }}" required>
                    @if($errors->has('description'))
                    <p class="help-block text-danger">
                        {{ $errors->first('description') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div>
                
                <div class="form-group col-md-6 {{ $errors->has('join_since') ? 'has-error' : '' }}">
                    <label for="email">Join Date</label>
                    <input type="date" id="join_since" name="join_since" class="form-control"
                        value="{{ old('join_since', isset($category) ? $category->join_since : '') }}" required>
                    @if($errors->has('join_since'))
                    <p class="help-block text-danger">
                        {{ $errors->first('join_since') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-12 {{ $errors->has('testimonial') ? 'has-error' : '' }}">
                    <label for="email">Testimonial</label>
                    <input type="text" id="testimonial" name="testimonial" class="form-control"
                        value="{{ old('testimonial', isset($category) ? $category->testimonial : '') }}">
                    @if($errors->has('testimonial'))
                    <p class="help-block text-danger">
                        {{ $errors->first('testimonial') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div>
                {{-- <div class="form-group col-md-6 {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="email">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select</option>
                        <option value="0" {{(isset($category) && ($category->status == 0)) ? 'selected' : ''}}>NO
                        </option>
                        <option value="1" {{(isset($category) && ($category->status == 1)) ? 'selected' : ''}}>Yes
                        </option>
                    </select>
                    @if($errors->has('description'))
                    <p class="help-block text-danger">
                        {{ $errors->first('description') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div> --}}
            </div>
            <div class="mt-5">
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection