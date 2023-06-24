@extends('layouts.admin')
@section('content')
@if (\Session::has('msg'))
<div class="alert alert-dark alert-dismissible mb-3" role="alert">
    {!! \Session::get('msg') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.settings') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.settings.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group mb-3 col-md-6 {{ $errors->has('logo') ? 'has-error' : '' }}">
                    <label class="form-label" for="logo">{{ __('logo') }}</label>
                    <input type="file" id="logo" name="logo" placeholder="{{ __('logo') }}" class="form-control"
                        value="{{ old('logo', isset($setting['logo']) ? $setting['logo'] : '') }}">
                    @if($errors->has('logo'))
                    <p class="help-block">
                        {{ $errors->first('logo') }}
                    </p>
                    @endif
                    @isset($setting['logo']) <img class="image mt-2" src="{{url('/assets/logo')}}/{{$setting['logo']}}"
                        width="120"> @endisset
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('site_title') ? 'has-error' : '' }}">
                    <label class="form-label" for="siteTitle">{{ __('Site Title') }}</label>
                    <input type="text" id="siteTitle" name="site_title" placeholder="{{ __('Site Title') }}"
                        class="form-control"
                        value="{{ old('site_title', isset($setting['site_title']) ? $setting['site_title'] : '') }}"
                        required>
                    @if($errors->has('site_title'))
                    <p class="help-block">
                        {{ $errors->first('site_title') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('site_address') ? 'has-error' : '' }}">
                    <label class="form-label" for="site_address">{{ __('Address') }}</label>
                    <input type="text" id="site_address" name="site_address" placeholder="{{ __('Address') }}"
                        class="form-control"
                        value="{{ old('site_address', isset($setting['site_address']) ? $setting['site_address'] : '') }}"
                        required>
                    @if($errors->has('site_address'))
                    <p class="help-block">
                        {{ $errors->first('site_address') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('contact') ? 'has-error' : '' }}">
                    <label class="form-label" for="contact">{{ __('Contact') }}</label>
                    <input type="text" id="contact" name="contact" placeholder="{{ __('Contact') }}"
                        class="form-control"
                        value="{{ old('contact', isset($setting['contact']) ? $setting['contact'] : '') }}">
                    @if($errors->has('contact'))
                    <p class="help-block">
                        {{ $errors->first('contact') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" placeholder="{{ __('Email') }}" class="form-control"
                        value="{{ old('email', isset($setting['email']) ? $setting['email'] : '') }}">
                    @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                    @endif
                </div>

                <div class="form-group mb-3 col-md-6 {{ $errors->has('favicon') ? 'has-error' : '' }}">
                    <label class="form-label" for="favicon">{{ __('favicon') }}</label>
                    <input type="file" id="favicon" name="favicon" placeholder="{{ __('favicon') }}"
                        class="form-control"
                        value="{{ old('favicon', isset($setting['favicon']) ? $setting['favicon'] : '') }}">
                    @if($errors->has('favicon'))
                    <p class="help-block">
                        {{ $errors->first('favicon') }}
                    </p>
                    @endif
                    @isset($setting['favicon']) <img class="image mt-2"
                        src="{{url('/assets/favicon')}}/{{$setting['favicon']}}" width="120"> @endisset
                </div>
            </div>
            <hr>
            <h4 class="card-title">SEO</h4>
            <div class="row">
                <div class="form-group mb-3 col-md-6 {{ $errors->has('website_title') ? 'has-error' : '' }}">
                    <label class="form-label" for="website_title">{{ __('Website Title') }}</label>
                    <input type="text" id="website_title" name="website_title" placeholder="{{ __('Website Title') }}"
                        class="form-control"
                        value="{{ old('website_title', isset($setting['website_title']) ? $setting['website_title'] : '') }}">
                    @if($errors->has('website_title'))
                    <p class="help-block">
                        {{ $errors->first('website_title') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                    <label class="form-label" for="meta_title">{{ __('Meta Title') }}</label>
                    <input type="text" id="meta_title" name="meta_title" placeholder="{{ __('Meta Title') }}"
                        class="form-control"
                        value="{{ old('meta_title', isset($setting['meta_title']) ? $setting['meta_title'] : '') }}">
                    @if($errors->has('meta_title'))
                    <p class="help-block">
                        {{ $errors->first('meta_title') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-12 {{ $errors->has('meta_desc') ? 'has-error' : '' }}">
                    <label class="form-label" for="meta_desc">{{ __('Meta Description') }}</label>
                    <textarea type="text" id="meta_desc" name="meta_desc" placeholder="{{ __('Meta Description') }}"
                        class="form-control">{{ old('meta_desc', isset($setting['meta_desc']) ? $setting['meta_desc'] : '') }}</textarea>
                    @if($errors->has('meta_desc'))
                    <p class="help-block">
                        {{ $errors->first('meta_desc') }}
                    </p>
                    @endif
                </div>
            </div>
            <hr>
            <h4 class="card-title">Social Links</h4>
            <div class="row">
                <div class="form-group mb-3 col-md-6 {{ $errors->has('facebook') ? 'has-error' : '' }}">
                    <label class="form-label" for="facebook">{{ __('Facebook') }}</label>
                    <input type="text" id="facebook" name="facebook" placeholder="{{ __('Facebook') }}"
                        class="form-control"
                        value="{{ old('facebook', isset($setting['facebook']) ? $setting['facebook'] : '') }}">
                    @if($errors->has('facebook'))
                    <p class="help-block">
                        {{ $errors->first('facebook') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('twitter') ? 'has-error' : '' }}">
                    <label class="form-label" for="twitter">{{ __('Twitter') }}</label>
                    <input type="text" id="twitter" name="twitter" placeholder="{{ __('Twitter') }}"
                        class="form-control"
                        value="{{ old('twitter', isset($setting['twitter']) ? $setting['twitter'] : '') }}">
                    @if($errors->has('twitter'))
                    <p class="help-block">
                        {{ $errors->first('twitter') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('instagram') ? 'has-error' : '' }}">
                    <label class="form-label" for="instagram">{{ __('Instagram') }}</label>
                    <input type="text" id="instagram" name="instagram" placeholder="{{ __('Instagram') }}"
                        class="form-control"
                        value="{{ old('instagram', isset($setting['instagram']) ? $setting['instagram'] : '') }}">
                    @if($errors->has('instagram'))
                    <p class="help-block">
                        {{ $errors->first('instagram') }}
                    </p>
                    @endif
                </div>
                <div class="form-group mb-3 col-md-6 {{ $errors->has('linked-in') ? 'has-error' : '' }}">
                    <label class="form-label" for="linked-in">{{ __('Linked In') }}</label>
                    <input type="text" id="linked-in" name="linked-in" placeholder="{{ __('Linked In') }}"
                        class="form-control"
                        value="{{ old('linked-in', isset($setting['linked-in']) ? $setting['linked-in'] : '') }}">
                    @if($errors->has('linked-in'))
                    <p class="help-block">
                        {{ $errors->first('linked-in') }}
                    </p>
                    @endif
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection