@extends('layouts.admin')
@section('content')
{{-- @can('role_create') --}}
<div style="margin-bottom: 20px;" class="row">
    <div class="col-lg-12">
        <h4 class="card-title">
            {{ trans('global.products') }} {{ trans('global.list') }}
            <a class="btn btn-success" style="float: right;" href="{{ route("dashboard.products.create") }}">
                {{ trans('global.add') }} {{ trans('global.product') }}
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
                        <th width="10">#{{ __('ID') }}</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Partner</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>{{ $value->id ?? '' }}</td>
                            <td><img src="{{$value->image}}" width="80" class="imageimg-thumbnail rounded"></td>
                            <td>{{ $value->name ?? '' }}</td>
                            <td>{{ $value->user->name ?? '' }}</td>
                            <td>{{ $value->category_name ?? '' }}</td>
                            <td>{{ $value->brand_name ?? '-' }}</td>
                            <td>{{ $value->price ?? '' }}</td>
                            <td>{{ $value->status ?'Published': 'Pending' }}</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('dashboard.products.edit', $value->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('dashboard.products.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="float: right;">
        {{$products->links()}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
</script>
@endsection
