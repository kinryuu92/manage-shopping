@extends('backEnd.layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'product', 'key' => 'Edit'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('products.update',['id'=>$products->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Product">Tên sản phẩm</label>
                                        <input type="text" class="form-control"
                                               value="{{ $products->name }}"
                                               id="Product" placeholder="Input product" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="Price">Giá sản phẩm</label>
                                        <input type="text" class="form-control"
                                               value="{{ $products->price }}"
                                               id="Price" placeholder="Input price" name="price">
                                    </div>

                                    <div class="form-group">
                                        <label>Nồng độ</label>
                                        <input type="text" class="form-control"
                                               value="{{ $products->alcohol_concentration }}"
                                               placeholder="Input alcohol concentration" name="alcohol concentration">
                                    </div>

                                    <div class="form-group">
                                        <label for="featureImagePath">Ảnh đại diện</label>
                                        <div class="col-3">
                                            <div class="row">
                                                <img class="feature_image" src="{{ $products->feature_image_path }}" alt="">
                                            </div>
                                        </div>
                                        <input type="file" class="form-control-file"
                                               id="featureImagePath" name="feature_image_path">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categoryParent">Chọn danh mục</label>
                                        <select class="form-control" id="categoryParent"
                                                name="category_id">
                                            <option value="">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Tags">Nhập tags cho sản phẩm</label>
                                        <select name='tags[]' class="form-control tags_select_choose"
                                                multiple="multiple" id="Tags">
                                            @foreach($products->tags as $tagItem)
                                            <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Dung tích</label>
                                        <input type="text" class="form-control"
                                               value="{{ $products->capacity }}"
                                              placeholder="Input alcohol concentration" name="capacity">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh chi tiết</label>
                                        <div class="col-12">
                                            <div class="row">
                                                @foreach($products->image as $productImageItem)
                                                    <div class="col-3">
                                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="file"
                                               class="form-control-file" multiple name="image_path[]">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="contents" class="form-control tinymce_editor_init">
                                            {{ $products->content }}
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
    <script src="https://cdn.tiny.cloud/1/jbmmwjh06q6420p8e318wcy1nr7foysptcseph23h12t2ee2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection



