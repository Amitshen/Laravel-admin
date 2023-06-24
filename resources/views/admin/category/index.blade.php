@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 20px;" class="row">
        <div class="col-lg-12">
            <h4 class="card-title">
                Categories {{ trans('global.list') }}
                <a class="btn btn-success" style="float: right;" href="{{ route("dashboard.category.create") }}">
                   Add Category
                </a>
            </h4>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header card-header-primary">
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">
                            #{{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
       
                        <th>
                            Status
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>
                                {{ $value->id ?? '' }}
                            </td>
                            <td>
                                {{ $value->name ?? '' }}
                            </td>
                
                            <td>
                                {{ $value->status?'Yes':'No' }}
                            </td>
                            <td>
                          {{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d') }}
                            </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('dashboard.category.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('dashboard.category.edit', $value->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                    <form action="{{ route('dashboard.category.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">No data found</td>
                        </tr>
                    @endforelse
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('dashboard.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
