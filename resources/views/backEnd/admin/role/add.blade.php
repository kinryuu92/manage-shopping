@extends('backEnd.layouts.admin')

@section('title')
    <title>Roles</title>
@endsection

@section('css')
    <link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('js')
        <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('backEnd.partials.content-header', ['name' => 'Roles', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('roles.store') }}" method="post" style="width: 100%">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Role">Role</label>
                                        <input type="Role" class="form-control "
                                               id="Slider" placeholder="Input role" name="name"
                                               value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="display_name">Display name</label>
                                        <textarea class="form-control"
                                                  name="display_name" id="display_name">
                                            {{ old('display_name') }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="" style="color: green">
                                        <input type="checkbox" class="checkall">
                                        Check all
                                    </label>
                                </div>
                                @foreach($permissionsParent as $permissionParentItem)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" class="checkbox_parent" value="">
                                            </label>
                                            Module {{ $permissionParentItem -> name }}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionParentItem->permissionChildrent as $permissionChildrentItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <label for="">
                                                        <input type="checkbox" name="permission_id[]"
                                                               class="checkbox_childrent"
                                                               value="{{ $permissionChildrentItem->id }}">
                                                    </label>
                                                    {{ $permissionChildrentItem->name     }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection


