@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.show') }} Client
        </h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Join Date
                        </th>
                        <td>
                            {{\Carbon\Carbon::parse($category->join_since)->format('d M, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                           {{$category->description??'-'}} 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Testimonial
                        </th>
                        <td>
                           {{$category->testimonial??'-'}} 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Profile Image
                        </th>
                        <td>
                            @if($category->profile_image )
                            <img height="50" width="50" src="{{ url('client/images'.'/'.$category->profile_image)}}"
                                @endif
                        </td>
                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
