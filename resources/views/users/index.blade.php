@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management'), 'navName' => 'Icons', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('create_user') }}" class="btn btn-sm btn-default">Add user</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                    </div>

                    <div class="toolbar">
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <a href="{{ route('edit_user', $user->id) }}" class="pl-2 pr-2"><i class="fa fa-pencil"></i></a>
                                        <form id="delete-form" method="POST" action="{{ route('delete_user', $user->id) }}">
                                            @csrf
                                            <div class="form-group mb-0">
                                              <button type="submit" class="btn btn-danger btn-link text-danger p-0" style="font-size: 16px;"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                        {{-- <a href="#" class="text-danger pl-2 pr-2"><i class="fa fa-trash"></i></a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
