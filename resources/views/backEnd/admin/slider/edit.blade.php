@extends('backEnd.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/edit/edit.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Slider', 'key' => 'edit'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('sliders.update', ['id'=>$sliders->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Slider">Tên slider</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="Slider" placeholder="Input slider" name="name"
                                               value="{{ $sliders->name }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Mô tả slider</label>
                                        <textarea class="form-control"
                                                  name="description" id="description">
                                            {{ $sliders->description  }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <div class="col-3">
                                            <div class="row">
                                                <img src="{{ $sliders->image_path }}" class="slider_image" alt="">
                                            </div>
                                        </div>
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


