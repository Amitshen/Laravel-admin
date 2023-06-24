@extends('layouts.admin')
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header border-bottom">
                        {{$title??'-'}}
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>News Title</strong></h6>
                                        <p class="mb-0">{{ $news->title ?? '-' }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 ">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>Publisher Name</strong></h6>
                                        <p class="mb-0">{{ $news->name ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 ">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>Is Publish</strong></h6>
                                        <p class="mb-0">{{ $news->is_publish ==1? 'Yes':'No' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>News Description</strong></h6>
                                        <p class="mb-0">{{ $news->description ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 ">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>Date</strong></h6>
                                        <p class="mb-0">{{ \Carbon\Carbon::parse($news->created_at)->format('Y-m-d') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="p-3 listViewclr bg-color">
                                        <h6><strong>News</strong></h6>
                                        <p class="mb-0">{!! $news->news !!}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection