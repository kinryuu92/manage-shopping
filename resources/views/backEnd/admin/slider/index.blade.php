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
        @include('backEnd.partials.content-header', ['name' => 'slider', 'key' => 'Add'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @can('slider-add')
                                    <a href="{{ route('sliders.create') }}" class="btn btn-success float-right">Add</a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên slider</th>
                                        <th>Description</th>
                                        <th>Hình ảnh</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->description }}</td>
                                            <td>
                                                <img class="slider_image" src=" {{ $slider->image_path }}" alt="">

                                            </td>
                                            <td>
                                                @can('slider-add')
                                                    <a href="{{ route('sliders.edit', ['id'=>$slider->id]) }}"
                                                       class="btn btn-primary"  >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('slider-add')
                                                    <a href=""
                                                       data-url="{{ route('sliders.delete', ['id'=>$slider->id]) }}"
                                                       class="btn btn-danger action_delete" >
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
                                        <th>Tên slider</th>
                                        <th>Description</th>
                                        <th>Hình ảnh</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="col-12 m-2">
                                    {{ $sliders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


