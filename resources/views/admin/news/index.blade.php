@extends('layouts.admin')
@section('content')
{{-- @can('role_create') --}}
<div style="margin-bottom: 20px;" class="row">
    <div class="col-lg-12">
        <h4 class="card-title">
            News {{ trans('global.list') }}
            <a class="btn btn-success" style="float: right;" href="{{ route("dashboard.news.create") }}">
                Add News
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
                        <th width="10">#ID</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Is publish</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>{{ $value->id ?? '' }}</td>
                            <td>{{ $value->title ?? '' }}</td>
                            <td>{{ $value->name ?? '' }}</td>
                            <td>{{ $value->is_publish == 0? 'No':'Yes' }}</td>
                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('d M , Y') }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('dashboard.news.show', $value->id) }}">
                                    {{ trans('global.show') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.news.edit', $value->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('dashboard.news.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td class="text-center text-danger" colspan="6">No data found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="float: right;">
        {{$news->links()}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
</script>
@endsection
