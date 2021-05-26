@extends('backEnd.layouts.admin')

@section('title')
    <title>Permission</title>
@endsection

@section('css')
    <link href="{{ asset('admins/categories/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('admins/permission/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'permission', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ route('permissions.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name module</label>
                                        <input type="text" class="form-control" name="module_parent">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="" style="color: green; padding:0 340px">
                                            <input type="checkbox" class="checkall">
                                            Check all
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(config('permission.module_childrent') as $moduleItemChildrent)
                                                <div class="col-md-3">
                                                    <label for="">
                                                        <input type="checkbox" value="{{ $moduleItemChildrent }}"
                                                               class="checkbox-chilrent" name="module_chilrent[]">
                                                        {{ $moduleItemChildrent }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection


