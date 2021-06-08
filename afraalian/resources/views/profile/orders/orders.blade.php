@extends('profile.index')
@section('adminContent')

<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    @if (!$orders)
        <br>
        <div class="alert alert-danger">شماهیچ نظری برای محصولات ثبت نکرده اید</div>
    @endif
    <table class="content-table">
        <thead>
            <tr>
                <th>محصولات سفارش داده شده</th>
                <th>کد سفارش</th>
                <th>تعداد</th>
                <th>قیمت کل</th>
                <th>وضغیت</th>
            </tr>
        </thead>
        <tbody class="tbody-mobile">
            @foreach ($orders as $order)

                @foreach($order->items as $item)


                    <tr class="comment-table-mobile">
                        <td class="comment-table-mobile-td">
                            <h4>محصولات سفارش داده شده</h4>&nbsp;
                            {{ $item->name }}
                        </td>
                        <td class="comment-table-mobile-td">
                            <h4>کد سفارش</h4>&nbsp;
                            {{ $order->order_number }}
                        </td>
                        <td class="comment-table-mobile-td">
                            <h4>تعداد</h4>&nbsp;
                            {{ $item->pivot->quantity }}
                        </td>
                        <td class="comment-table-mobile-td">
                            <h4>قیمت کل</h4>
                            {{ number_format($item->price) }}
                        </td>

                        <td class="comment-table-mobile-td">
                            <h4>وضغیت</h4>&nbsp;
                            @if ($order->status == 'pending')
                                <span><span class="badge badge-warning">در حال برسی</span></span>
                            @endif
                            @if ($order->status == 'paid')
                                <span><span class="badge badge-success">پرداخت شده</span></span>
                            @endif
                        </td>

                    </tr>

                @endforeach


            @endforeach
        </tbody>
    </table>
</div>



@endsection
