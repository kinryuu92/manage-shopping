@extends('backEnd.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Slider', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Slider">Tên slider</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="Slider" placeholder="Input slider" name="name"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Mô tả slider</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  name="description" id="description">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file"
                                               class="form-control @error('image_path') is-invalid @enderror"
                                               id="image" name="image_path">
                                        @error('image_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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


