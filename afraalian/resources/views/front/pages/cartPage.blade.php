@extends('front.index')
@section('content')

@section('title')
    {{ $title }}
@endsection
    <div class="">

        <div class="container container-cart-page">
            <div class="title-page-cart">
                <div class="title-page-cart-child">
                    <h4><i class="fal fa-shopping-bag fa-lg"></i>&nbsp;سبد خرید</h4>

                </div>

                <small style="font-size: 15px;">{{ $items->count() }} محصول اضافه شد</small>
            </div>

            @if (!$items->count())




                <div class="cart-notFund-section">
                    <div class="warning-cart-notFund-section">
                        <i class="fal fa-engine-warning"></i>
                    </div>
                    <div class="items-cart-notFund-section">
                        <h3>سبد خرید شما خالی است</h3>
                        <a href="{{ route('index.page') }}" class="btn btn-warning">بازگشت به صفحه اصلی</a>
                    </div>
                </div>




            @endif


            @if ($items->count())
                <div class="table-box-cart-page">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>محصول</th>
                                <th>توضیحات</th>
                                <th>قیمت واحد</th>
                                <th>تعداد</th>
                                <th>مجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <h4>حذف : </h4>&nbsp;
                                        <form action="{{ route('carte.delete', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border-0">
                                                <i class="far fa-times fa-2x text-danger" style="cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <h4>محصول : </h4>&nbsp;<img width="100" src="{!! $item->index_image !!}" />
                                    </td>
                                    <td>
                                        <h4>توضیحات : </h4>&nbsp;{{ $item->name }}
                                    </td>
                                    <td>
                                        <h4>قیمت واحد : </h4>
                                        &nbsp;{{ number_format($item->price) }}&nbsp;<span>تومان</span>
                                    </td>
                                    <td>
                                        <form class="d-flex align-items-center" id="update-cart"
                                            action="{{ route('carte.update', $item->id) }}" method="POST">
                                            @csrf
                                            <h4>تعداد : </h4>&nbsp;

                                            <div class="number__container pr-2">
                                                <a role="button" @click="RemoveCountProductInProductPageForAddToCart"
                                                    class="increment"><i class="far fa-minus"></i></a>
                                                <input value="{{ $item->quantity }}" name="quantity" max="10" min="1"
                                                    class="quantity" type="number" inputmode="numeric"
                                                    placeholder="تعداد" />
                                                <a role="button" @click="AddCountProductInProductPageForAddToCart"
                                                    class="decrement"><i class="far fa-plus"></i></a>
                                            </div>
                                        </form>
                                    </td>

                                    <td>
                                        <h4>مجموع : </h4>
                                        &nbsp;{{ number_format(Cart::get($item->id)->getPriceSum()) }}&nbsp;<span>تومان</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="actions-cart-page">
                        <div class="code-tacfif-in-cart-page-computer">
                            <div class="d-flex">
                                <input type="text" placeholder="کد تخفیف" name="" class="form-control">
                                &nbsp;<button class="btn btn-warning-me">اعمال کد</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning-me" form="update-cart">بروزرسانی سبد خرید</button>

                    </div>

                    <div class="code-tacfif-in-cart-page">
                        <div class="">
                            <input type="text" placeholder="کد تخفیف" name="" class="form-control">
                            &nbsp;<button class="btn btn-warning-me">اعمال کد</button>
                        </div>
                    </div>
                </div>



                <div class="items-cart-page">
                    <div class="item-mored-niaz-forPay">



                    </div>
                    <div class="faraiand-pay">
                        <ul>
                            <li>
                                <span class="count-product-cart-page">قیمت کل</span>
                                <span class="price-number-cart-page">
                                    {{ number_format(\Cart::getTotal()) }}
                                    <span class="currency-cart-page">تومان</span>
                                </span>
                            </li>
                            <li>
                                <span class="count-product-cart-page">تخفیف</span>
                                <span class="price-number-cart-page">
                                    0
                                    <span class="currency-cart-page">تومان</span>
                                </span>
                            </li>
                            <li>
                                <span class="count-product-cart-page">هزینه ارسال</span>
                                <span class="price-number-cart-page">
                                    رایگان!
                                </span>
                            </li>
                            <li>
                                <span class="count-product-cart-page">مبلغ قابل پرداخت</span>
                                <span class="price-number-cart-page">
                                    {{ number_format(\Cart::getTotal()) }}
                                    <span class="currency-cart-page">تومان</span>
                                </span>
                            </li>
                            <li>
                                <a href="{{ route('checkout.page') }}" class="btn btn-danger w-100">ادامه فرایند پرداخت </a>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>


        <div class="table-product-table-catr-page-for-mobile row">

            <div class="container">
                <table class="table-product-table-catr-page">
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="row-product-table-catr-page">
                                <td class="product-name">
                                    <span>محصول</span>
                                    <h5>{{ $item->name }}</h5>
                                </td>
                                <td class="product-name">
                                    <span>قیمت</span>
                                    <h5>{{ number_format($item->price) }} <span>تومان</span></h5>
                                </td>
                                <td class="product-name">
                                    <span>تعداد</span>
                                    <div class="number__container pr-2">
                                        <a role="button" @click="RemoveCountProductInProductPageForAddToCart"
                                            class="increment"><i class="far fa-minus"></i></a>
                                        <input value="{{ $item->quantity }}" name="quantity" max="10" min="1"
                                            class="quantity" type="number" inputmode="numeric"
                                            placeholder="تعداد" />
                                        <a role="button" @click="AddCountProductInProductPageForAddToCart"
                                            class="decrement"><i class="far fa-plus"></i></a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <span>مجموع</span>
                                    <h5>&nbsp;{{ number_format(Cart::get($item->id)->getPriceSum()) }}&nbsp;<span>تومان</span></h5>
                                </td>
                                <td class="product-name">
                                    <span></span>
                                    <h5>
                                        <form action="{{ route('carte.delete', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border-0">
                                                <i class="far fa-times fa-2x text-danger" style="cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </h5>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="code-tacfif-in-cart-page">
                <div class="">
                    <input type="text" placeholder="کد تخفیف" name="" class="form-control">
                    <button class="btn code-tacfif-btn-in-cart-page">اعمال کد</button>
                </div>

                <div class="price-total-for-mobile-in-product-cart">
                    <h6>جمع کل</h6>
                    :&nbsp;
                    <span>{{ number_format(\Cart::getTotal()) }}</span><span>تومان</span>

                </div>
                <button type="submit" class="btn btn-warning-me w-100 mt-2" form="update-cart">بروزرسانی سبد خرید</button>

            </div>
        </div>


        <div class="btn-pay-nahaeCart-page-box">
            <a href="{{ route('checkout.page') }}" class="btn btn-danger w-100">ادامه فرایند پرداخت</a>
        </div>
        @endif

    </div>


@endsection
