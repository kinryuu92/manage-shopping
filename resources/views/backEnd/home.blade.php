@extends('backEnd.layouts.admin')
@section('title')
    <title>Trang chu</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backEnd.partials.content-header', ['name'=>'Home', 'key'=>'home'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: #5C821A">Welcome to admin page</h1>
                        <h4 style="color: #C6D166">have a nice day!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
