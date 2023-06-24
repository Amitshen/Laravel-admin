@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} Category
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.category.store") }}" method="POST" enctype="multipart/form-data">
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
                <div class="form-group col-md-6 {{ $errors->has('status') ? 'has-error' : '' }}">
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
                </div>
            </div>
            <div class="mt-5">
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection