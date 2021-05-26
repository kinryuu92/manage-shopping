@extends('backEnd.layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link href="{{ asset('admins/setting/index/index.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Settings', 'key' => 'list'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-group success float-right">
                                    @can('setting-add')
                                        <a class="btn dropdown-toggle btn-success " data-toggle="dropdown" href="#">
                                            Add
                                            <span class="caret"></span>
                                        </a>
                                    @endcan
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                                        <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a>
                                        </li>
                                    </ul>
                                </div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>config key</th>
                                        <th>config value</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td>{{ $setting->config_key }}</td>
                                            <td>{{ $setting->config_value }}</td>
                                            <td>
                                                @can('setting-edit')
                                                    <a href="{{ route('settings.edit', ['id'=>$setting->id]) . '?type=' . $setting->type }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('setting-delete')
                                                    <a
                                                        data-url="{{ route('settings.delete', ['id'=>$setting->id]) }}"
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
                                        <th>config key</th>
                                        <th>config value</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="col-12 m-2">
                                    {{ $settings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


