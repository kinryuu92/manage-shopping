@extends('backEnd.layouts.admin')

@section('title')
    <title>User</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/user/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('admins/user/add/add.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'User', 'key' => 'edit'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="User">Tên</label>
                                        <input type="text" class="form-control "
                                               id="User" placeholder="Input name" name="name"
                                               value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="User">Email</label>
                                        <input type="email" class="form-control "
                                               id="User" placeholder="Input email" name="email"
                                               value="{{ $user->email }}">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="User">Password</label>
                                        <input type="password"
                                               class="form-control"
                                               id="User" placeholder="Input password"
                                               name="password" value="{{ $user->password }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn vai trò</label>
                                        <select name="role_id[]"
                                                class="form-control select2-init "
                                                multiple>
                                            <option value="">Admin</option>
                                            @foreach($roles as $role)
                                                <option
                                                    {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                                    value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection


