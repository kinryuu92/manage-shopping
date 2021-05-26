@extends('backEnd.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backEnd.partials.content-header', ['name' => 'category', 'key' => 'Edit'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('categories.update', ['id'=>$category->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Category">Tên danh mục</label>
                                        <input type="text" class="form-control" id="Category"
                                               value="{{ $category->name }}"
                                               placeholder="Input category" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Chọn danh mục cha</label>
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="parent_id">
                                            <option value="0">Chọn danh mục cha</option>
                                            {!! $htmlOption !!}
                                        </select>
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


