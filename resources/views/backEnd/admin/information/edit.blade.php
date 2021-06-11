@extends('backEnd.layouts.admin')

@section('title')
    <title>Add information</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Information', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Contact info</label>
                                        <textarea name="info_contact"
                                                  class="form-control tinymce_editor_init">
                                            {{ old('information') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Map</label>
                                        <textarea class="form-control " name="map" rows="7">
                                        {{ old('map') }}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection



