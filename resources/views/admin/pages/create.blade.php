@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ $title }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.pages.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{isset($page)?$page->id:''}}" name="id">
            <div class="row">
                <div class="form-group mb-3 col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="form-label" for="name">{{ __('Page Title') }}*</label>
                    <input type="text" id="name" name="name" placeholder="{{ __('Page Title') }}" class="form-control"
                        value="{{ old('name', isset($page) ? $page->name : '') }}" required>
                    @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label class="form-label" for="status">{{ __('Status') }}</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{isset($page) && $page->status?'selected':''}}>Publish</option>
                        <option value="0" {{isset($page) && !$page->status?'selected':''}}>Pending</option>
                    </select>
                    @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="form-group mb-3 col-md-12 {{ $errors->has('description') ? 'has-error' : '' }}">
                <label class="form-label" for="description">{{ __('Description') }}</label>
                <textarea id="description" name="description" placeholder="{{ __('Description') }}"
                    class="form-control ckeditor">{{ old('description', isset($page) ? $page->description : '') }}</textarea>
                @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
                @endif
            </div>



            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection