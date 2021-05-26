@extends('backEnd.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/index/list.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Roles', 'key' => 'Add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                @can('role-add')
                                    <a href="{{ route('roles.create') }}" class="btn btn-success float-right">Add</a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role name</th>
                                        <th>display name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('roles.edit',['id'=>$role->id]) }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    <a
                                                        data-url="{{ route('roles.delete',['id'=>$role->id]) }}"
                                                        class="btn btn-danger action_delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Role name</th>
                                        <th>display name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="col-12 m-2">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


