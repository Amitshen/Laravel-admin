@extends('layouts.admin')
@section('content')
@can('role_create')
    <div style="margin-bottom: 20px;" class="row">
        <div class="col-lg-12">
            <h4 class="card-title">
                {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
                <a class="btn btn-success" style="float: right;" href="{{ route("dashboard.roles.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                </a>
            </h4>
        </div>
    </div>
@endcan
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
                <input type="text" name="search" id="search" class="search form-control" placeholder="{{trans('labels.search')}}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="{{ (request()->get('search_category'))??''}}"/>
                <div class="input-group-prepend">
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
                        <th width="10">
                            #{{ trans('cruds.role.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.role.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.role.fields.permissions') }}
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td>
                                {{ $role->id ?? '' }}
                            </td>
                            <td>
                                {{ $role->title ?? '' }}
                            </td>
                            <td>
                                @foreach($role->permissions as $key => $item)
                                    <span class="">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('role_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('dashboard.roles.show', $role->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('role_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.roles.edit', $role->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('role_delete')
                                    <form action="{{ route('dashboard.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('role_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('dashboard.roles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Role:not(.ajaxTable)').DataTable(
      { buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
