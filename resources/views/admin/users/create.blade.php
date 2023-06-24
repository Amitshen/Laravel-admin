@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("dashboard.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                    @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                    @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.password_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="email">Phone</label>
                    <input type="number" id="phone" name="phone" class="form-control"
                        value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                    @if($errors->has('phone'))
                    <p class="help-block text-danger">
                        {{ $errors->first('phone') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.email_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('roles') ? 'has-error' : '' }}">
                    <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                        @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->
                            roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                    <p class="help-block">
                        {{ $errors->first('roles') }}
                    </p>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.roles_helper') }}
                    </p>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="roles">Profile Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                    <p class="help-block text-danger">
                        {{ $errors->first('image') }}
                    </p>
                    @endif
                    @if(isset($user->profile_image))
                    <img src="{{url('profile-image',$user->profile_image)}}" height="50" width="50">
                    @endif
                </div>
            </div>
            <div class="mt-5">
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection