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
        @include('backEnd.partials.content-header', ['name' => 'Setting', 'key' => 'edit'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('settings.update', ['id'=>$settings->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Config_key">Config key</label>
                                        <input type="text"
                                               class="form-control "
                                               id="Config_key" name="config_key"
                                               value="{{ $settings->config_key }}">
                                    </div>

                                    @if(request()->type === 'Text')
                                        <div class="form-group">
                                            <label for="Config_value">Config value</label>
                                            <input type="text"
                                                   class="form-control "
                                                   id="Config_value" name="config_value"
                                                   value="{{ $settings->config_value }}">
                                        </div>
                                    @elseif(request()->type === 'Textarea')
                                        <div class="form-group">
                                            <label>Config value</label>
                                            <textarea class="form-control"
                                                      name="config_value" rows="5">
                                                {{ $settings->config_value }}
                                            </textarea>
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


