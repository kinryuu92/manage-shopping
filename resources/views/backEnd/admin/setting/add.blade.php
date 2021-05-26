@extends('backEnd.layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link href="{{ asset('admins/setting/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Setting', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('settings.store') . '?type=' . request()->type }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Category">Config key</label>
                                        <input type="text" class="form-control  @error('config_key') is-invalid @enderror"
                                               id="Category" name="config_key">
                                        @error('config_key')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if(request()->type === 'Text')
                                    <div class="form-group">
                                        <label for="Category">Config value</label>
                                        <input type="text" class="form-control  @error('config_value') is-invalid @enderror"
                                               id="Category" name="config_value">
                                        @error('config_value')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @elseif(request()->type === 'Textarea')
                                        <div class="form-group">
                                            <label>Config value</label>
                                            <textarea class="form-control @error('config_value') is-invalid @enderror" name="config_value"
                                                      rows="5">
                                    </textarea>
                                            @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    @endif

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


