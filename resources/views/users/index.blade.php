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
                                <p class="text-sm mb-0">
                                    This is an example of user management. This is a minimal setup in order to get
                                    started fast.
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-default">Add user</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                    </div>

                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Start</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Admin Admin</td>
                                    <td>admin@lightbp.com</td>
                                    <td>2020-02-25 12:37:04</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
