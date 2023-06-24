@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ $title }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.news.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{isset($news)?$news->id:''}}" name="id">
            <div class="row">
                <div class="form-group mb-3 col-md-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="form-label" for="title">Title*</label>
                    <input type="text" id="title" name="title" placeholder="{{ __('Title') }}" class="form-control"
                        value="{{ old('name', isset($news) ? $news->title : '') }}" required>
                    @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                    @endif
                </div>

                {{-- <div class="form-group mb-3 {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label class="form-label" for="description">Description*</label>
                    <input type="text" id="email" name="description" placeholder="Description" class="form-control"
                        value="{{ old('description', isset($news) ? $news->description : '') }}" required>
                    @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                    @endif
                </div> --}}

                <div class="form-group mb-3 col-md-6 {{ $errors->has('publisher') ? 'has-error' : '' }}">
                    <label class="form-label" for="publisher">{{ __('publisher') }}*</label>
                    <select id="publisher" name="publisher" class="form-control" required>
                        <option value="">Select Publisher </option>
                        @foreach ($piblisher as $value)
                        <option value="{{ $value->id}}" {{isset($news)?($news->publisher_id ==
                            $value->id?'Selected':''):''}}>{{$value->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('publisher'))
                    <p class="help-block text-danger">
                        {{ $errors->first('publisher') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('tags') ? 'has-error' : '' }}">
                    <label class="form-label" for="tags">Tag</label>
                    <select id="tags" name="tags[]" class="form-control select2" multiple required>
                        <option value="">Select tag </option>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id}}" {{ (in_array($tag->id, old('roles', [])) || isset($news) &&
                            $news->tags->contains($tag->id)) ? 'selected' : '' }}>{{$tag->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                    <p class="help-block text-danger">
                        {{ $errors->first('tags') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('is_publish') ? 'has-error' : '' }}">
                    <label class="form-label" for="is_publish">Is publish*</label>
                    <select id="is_publish" name="is_publish" class="form-control" required>
                        <option value="">Select </option>
                        <option value="0" {{isset($news)?($news->is_publish==0?'Selected':''):''}}>No</option>
                        <option value="1" {{isset($news)?($news->is_publish==1?'Selected':''):''}}>Yes</option>
                    </select>
                    @if($errors->has('is_publish'))
                    <p class="help-block">
                        {{ $errors->first('is_publish') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('category') ? 'has-error' : '' }}">
                    <label class="form-label" for="category">Category*</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">Select </option>
                        @foreach ($category as $value)
                        <option value="{{$value->id}}" {{isset($news)?($news->
                            category==$value->id?'Selected':''):''}}>{{$value->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                    <p class="help-block">
                        {{ $errors->first('category') }}
                    </p>
                    @endif
                </div>

                <div class="form-group col-md-6 {{ $errors->has('feature_image') ? 'has-error' : '' }}">
                    <label for="roles">Feature Image</label>
                    <input type="file" name="feature_image" class="form-control">
                    @if($errors->has('feature_image'))
                    <p class="help-block text-danger">
                        {{ $errors->first('feature_image') }}
                    </p>
                    @endif
                    @if(isset($news->feature_image))
                    <img src="{{url('feature-image',$news->feature_image)}}" height="50" width="50">
                    @endif
                </div>

                {{-- <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                    <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="tags[]" id="tags" class="form-control select2" multiple="multiple" required>
                        @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($news) && $news->
                            tags->contains($id)) ? 'selected' : '' }}>{{ $tags }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                    <p class="help-block">
                        {{ $errors->first('tags') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.roles_helper') }}
                    </p>
                </div> --}}
                </a>

                <div class="form-group mb-3 col-md-12{{ $errors->has('news') ? 'has-error' : '' }}">
                    <label class="form-label" for="news">{{ __('news') }}*</label>
                    <textarea id="news" name="news" placeholder="{{ __('news') }}"
                        class="form-control ckeditor">{{ old('news', isset($news) ? $news->news : '') }}</textarea>
                    @if($errors->has('news'))
                    <p class="help-block">
                        {{ $errors->first('news') }}
                    </p>
                    @endif
                </div>

                <div>
                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection