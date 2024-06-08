@extends('layouts.admin')

@section('title')
    @lang('Manage Project')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Manage Project')</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> @lang('Add New')
                    </a>

                </div>
                <div class="table-responsive p-3">
                    <table class="table table-striped">
                        <tr>
                            <th>@lang('Photo')</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Location ')</th>
                            <th class="text-right">@lang('Action')</th>
                        </tr>
                        @forelse ($projects as $item)
                            <tr>
                                <td data-label="@lang('Photo')">
                                    <img src="{{ getPhoto($item->photo) }}" alt="icon" class="img-fluid"
                                        style="width: 150px">
                                </td>
                                <td data-label="@lang('Name')">
                                    {{ $item->title }}
                                </td>
                                <td data-label="@lang('Location')">
                                    {{ $item->location }}
                                </td>

                                <td data-label="{{ __('Action') }}">
                                    <a href="{{ route('admin.project.edit', $item->id) }}"
                                        class="btn btn-primary  btn-sm edit mb-1" data-toggle="tooltip"
                                        title="@lang('Edit')"><i class="fas fa-edit"></i></a>

                                    <a href="javascript:void(0)" class="btn btn-danger  btn-sm remove mb-1"
                                        data-route="{{ route('admin.project.destroy', $item) }}" data-toggle="tooltip"
                                        title="@lang('Delete')"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="mt-3">@lang('Are you sure to remove?')</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-danger">@lang('Confirm')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';
        $('.remove').on('click', function() {
            var route = $(this).data('route')
            $('#del').find('form').attr('action', route)
            $('#del').modal('show')
        })
    </script>
@endpush
