@extends('layouts.admin')
@section('content')
{{-- @can('role_create') --}}
<div style="margin-bottom: 20px;" class="row">
    <div class="col-lg-12">
        <h4 class="card-title">
            {{ trans('global.page') }} {{ trans('global.list') }}
            <a class="btn btn-success" style="float: right;" href="{{ route("dashboard.pages.create") }}">
                {{ trans('global.add') }} {{ trans('global.page') }}
            </a>
        </h4>
    </div>
</div>
{{-- @endcan --}}
@if (\Session::has('msg'))
    <div class="alert alert-dark alert-dismissible mb-3" role="alert">
        {!! \Session::get('msg') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card">
    <div class="card-header card-header-primary">
        <form class="row">
            <div class="col-2">
            </div>
            <div class="col-6"></div>
            <div class="col-4">
                <div class="input-group-prepend d-flex">
                    <input type="text" name="search" style="margin-right: 5px;" id="search" class="search form-control" placeholder="{{ __('Search')}}" value="{{ (request()->get('search'))??''}}"/>
                    <button class="input-group-text" id="inputGroup-sizing-sm"><i class='bx bx-search'></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">#{{ trans('cruds.role.fields.id') }}</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>{{ $value->id ?? '' }}</td>
                            <td>{{ $value->name ?? '' }}</td>
                            <td>{{ $value->status ?'Published': 'Pending' }}</td>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('single-page', $value->slug) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.pages.edit', $value->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('dashboard.pages.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-danger">No data found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="float: right;">
        {{$pages->links()}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
</script>
@endsection
