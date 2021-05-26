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
        @include('backEnd.partials.content-header', ['name' => 'product', 'key' => 'add'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Product">Tên sản phẩm</label>
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                               id="Product" placeholder="Input product" name="name"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Price">Giá sản phẩm</label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                                               id="Price" placeholder="Input price" name="price" value="{{ old('price') }}" >
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nồng độ</label>
                                        <input type="text" class="form-control @error('alcohol_concentration') is-invalid @enderror"
                                               placeholder="Input alcohol concentration" name="alcohol_concentration" value="{{ old('alcohol_concentration') }}" >
                                        @error('alcohol_concentration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="featureImagePath">Ảnh đại diện</label>
                                        <input type="file" class="form-control-file @error('feature_image_path') is-invalid @enderror"
                                               id="featureImagePath" name="feature_image_path" >
                                        @error('feature_image_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="categoryParent">Chọn danh mục</label>
                                        <select class="form-control @error(' category_id') is-invalid @enderror"
                                                id="categoryParent"
                                                name="category_id">
                                            <option value="">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Tags">Nhập tags cho sản phẩm</label>
                                        <select name='tags[]'
                                                class="form-control tags_select_choose @error('tags') is-invalid @enderror"
                                                multiple="multiple" id="Tags" >
                                        </select>
                                        @error('tags')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Dung tích</label>
                                        <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                                               placeholder="Input capacity" name="capacity" value="{{ old('capacity') }}" >
                                        @error('capacity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh chi tiết</label>
                                        <input type="file"
                                               class="form-control-file @error('image_path') is-invalid @enderror"
                                               multiple
                                               name="image_path[]">
                                    </div>
                                    @error('image_path')
                                    <div class="alert alert-danger mb-1">{{ $message }}</div>
                                    @enderror
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
                                        <textarea name="contents"
                                                  class="form-control tinymce_editor_init @error('contents') is-invalid @enderror">
                                            {{ old('contents') }}
                                        </textarea>
                                    </div>
                                    @error('contents')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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



