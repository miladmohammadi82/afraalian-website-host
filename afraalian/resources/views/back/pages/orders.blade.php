@extends('back.index')
@section('contentAdmin')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                @include('back.pages.layouts.message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">سفارشات</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- /.card-header -->

                    <div id="loading">
                        <vue-simple-spinner class="mt4" size="large" message="Loading..."></vue-simple-spinner>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" style="font-size: 16px;">
                            <tbody>
                                <tr>
                                    <th>آیدی</th>
                                    <th>آیدی سفارش دهنده</th>
                                    <th>مبلغ پرداختی</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت حمل ونقل</th>
                                    <th>نام سفارش دهنده</th>
                                    <th>آدرس</th>
                                    <th>شهر</th>
                                    <th>استان</th>
                                    <th>تلفن</th>
                                    <th>کدپستی</th>
                                    <th>تارییخ</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr class="order-table">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user_id }}</td>
                                        <td>{{ number_format($order->grand_total) }}</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span><span class="badge badge-warning">در حال برسی</span></span>
                                            @endif
                                            @if ($order->status == 'paid')
                                                <span><span class="badge badge-success">پرداخت شده</span></span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->Shipping_status == 0)
                                                <a href="{{ route('order.edit.shipping.status.admin.panel', $order->id) }}"><span class="badge badge-warning">ارسال نشده</span></a>
                                            @endif
                                            @if ($order->Shipping_status == 1)
                                                <a href="{{ route('order.edit.shipping.status.admin.panel', $order->id) }}"><span class="badge badge-success">ارسال شده</span></a>
                                            @endif
                                        </td>
                                        <td>{{ $order->shopping_fullname }}</td>
                                        <td>{{ $order->shopping_address }}</td>
                                        <td>{{ $order->shopping_city }}</td>
                                        <td>{{ $order->shopping_state }}</td>
                                        <td>{{ $order->shopping_phone }}</td>
                                        <td>{{ $order->shopping_zipcode }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="{{ route('order.show.admin.panel', $order->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                    <table class="table table-hover" style="font-size: 16px; width: 100%;">


                                        @foreach ($order->items as $item)
                                            <ul class="order-table-list">
                                                <li><span>آیدی محصول</span>: {{ $item->id }}</li>
                                                <li><span>نام محصول</span>: {{ $item->name }}</li>
                                                <li><span>قیمت محصول</span>: {{ number_format($item->price) }} تومان</li>
                                                <li><span>تعداد محصول</span>: {{ $item->pivot->quantity }}</li>
                                            </ul>
                                        @endforeach


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>



        </div>

    </div>


@endsection
