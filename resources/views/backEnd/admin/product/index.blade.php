@extends('backEnd.layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/index/list.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'Product', 'key' => 'list'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @can('product-add')
                                    <a href="{{ route('products.create') }}" class="btn btn-success float-right">Add</a>
                                @endcan
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Dung tích</th>
                                        <th>Nồng độ</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td scope="row">{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ number_format($product->price)}} $</td>
                                            <td>{{ $product->capacity }}</td>
                                            <td>{{ $product->alcohol_concentration }}</td>
                                            <td>
                                                <img class="product_image" src="{{ $product->feature_image_path }}"
                                                     alt="">
                                            </td>
                                            <td>{{ optional( $product->category)->name }}</td>
                                            <td>
                                                @can('product-edit')
                                                    <a href="{{ route('products.edit', ['id'=>$product->id]) }}"
                                                       class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('product-delete')
                                                    <a
                                                        data-url="{{ route('products.delete', ['id'=>$product->id]) }}"
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
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Dung tích</th>
                                        <th>Nồng độ</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="col-12 m-2">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

