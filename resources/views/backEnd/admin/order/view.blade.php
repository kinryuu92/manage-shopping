@extends('backEnd.layouts.admin')

@section('title')
    <title>Order</title>
@endsection



@section('content')
    <div class="content-wrapper">
        @include('backEnd.partials.content-header', ['name' => 'Order', 'key' => 'detail'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            {{ $shipping->note }}
                        </div>
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                                        <small class="float-right"></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>{{ $customer->name }}</strong><br>
                                        <b>Phone:</b>  {{ $customer->phone }}<br>
                                        <b>Email:</b> {{ $customer->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $shipping->name }}</strong><br>
                                        <b>Address:</b> {{ $shipping->address }}<br>
                                        <b>Phone:</b> {{ $shipping->phone }}<br>
                                        <b>Email:</b> {{ $shipping->email }}
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice {{ $orders->code }}</b><br>
                                    <br>
                                    <b>Order ID:</b> {{$orders->id}}<br>
                                    <b>Order date:</b> {{ $orders->created_at }}<br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        @php
                                            $total = 0;
                                        @endphp
                                        <tbody>
                                        @foreach($order_details as $key => $order_detail)
                                            @php
                                                $subtotal = $order_detail->product_price * $order_detail->sales_quantity;
                                                $total += $subtotal
                                            @endphp
                                            <tr>
                                                <td>{{ $order_detail->id }}</td>
                                                <td>{{ $order_detail->product_name }}</td>
                                                <td>{{ $order_detail->sales_quantity }}</td>
                                                <td>{{number_format( $order_detail->product_price) }} $</td>
                                                <td>{{number_format($subtotal) }} $</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    @if($shipping->method==0)
                                        Visa cart
                                        <img src="{{asset('adminlte/dist/img/credit/visa.png')}}" alt="Visa">
                                    @else
                                        Cash payment
                                        <img width="30px"
                                             src="https://www.freeiconspng.com/uploads/cash-payment-icon-5.png"
                                             alt="Visa">
                                    @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Total:</th>
                                                <td>{{ number_format($total) }} $</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection





