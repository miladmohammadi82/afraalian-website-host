@extends('front.index')
@section('content')
    <div class="container-fluid">


        <div class="content-checkoutPage">

            <div class="step-checkout col-lg-12 col-md-12 col-sm-12 row">
                @if (is_null($address))
                    <div class="">
                        <h3 class="title-in-page-checkout">
                            <span>جزئیات صورتحساب</span>
                        </h3>
                        <a href="{{ route('getState.checkout.page', 2) }}" class="btn btn-block">کلیک کن</a>

                        <form action="{{ route('orders.store') }}" method="post" id="send-info-checkout">
                            @csrf
                            <div class="form-group group col-lg-6 col-sm-12 col-md-12">
                                <input class="input-checkout-priduct-info" name="shopping_fullname" type="text" required>
                                <span class="bar"></span>
                                <label class="label-checkout-priduct-info"><i class="fas fa-user"></i> نام و نام
                                    خانوادگی*</label>
                            </div>
                            <div class="form-group group col-lg-12 w-100  mt-3">
                                <input class="input-checkout-priduct-info w-100" name="shopping_address" type="text"
                                    required>
                                <span class="bar w-100"></span>
                                <label class="label-checkout-priduct-info w-100"><i class="fas fa-map-marker-alt"></i> آدرس*
                                </label>
                            </div>

                            <div class="select-divs-addres mt-3">
                                <div class="form-group group col-lg-6 col-sm-12 col-md-12">
                                    <label for="" class="pb-2" style="color: #7e7e7e">استان*</label>
                                    <div class="search-select-box">
                                        <select id="shopping_state" class="form-control" value="{{ old('shopping_state') }}"
                                            name="shopping_state" data-live-search="true">
                                            <label for="shopping_state"></label>

                                            <option selected>استان را انتخاب کنید</option>

                                            @foreach ($states as $state)

                                                <option value="{{ $state->id }}">{{ $state->name }}</option>

                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group group col-lg-6 col-sm-12 col-md-12">
                                    <label for="" class="pb-2" style="color: #7e7e7e">شهر*</label>

                                    <div class="search-select-box">
                                        <select id="shopping_city" class="form-control" name="shopping_city"
                                            data-live-search="true" id="city">
                                            <option selected>شهر را انتخاب کنید</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group group col-lg-12 w-100  mt-4">
                                <input class="input-checkout-priduct-info w-100" name="shopping_zipcode" type="text"
                                    required>
                                <span class="bar w-100"></span>
                                <label class="label-checkout-priduct-info w-100"><i class="fas fa-location-arrow"></i> کد
                                    پستی* </label>
                            </div>
                            <div class="form-group group col-lg-12 w-100  mt-4">
                                <input class="input-checkout-priduct-info w-100" name="shopping_phone" type="text" required>
                                <span class="bar w-100"></span>
                                <label class="label-checkout-priduct-info w-100"><i class="fas fa-phone-alt"></i> شماره
                                    تماس* </label>
                            </div>
                            <div class="form-group group col-lg-12 w-100  mt-4">
                                <input class="input-checkout-priduct-info w-100" type="text" required>
                                <span class="bar w-100"></span>
                                <label class="label-checkout-priduct-info w-100"><i class="fas fa-at"></i> آدرس ایمیل*
                                </label>
                            </div>

                            <div class="form-group group col-lg-12 w-100  mt-4">
                                <label class="mb-2" style="color: #7e7e7e"> توضیحات سفارش (اختیاری) </label>

                                <textarea class="form-control" placeholder="توضیحات سفارش (اختیاری)" name="notes" id=""
                                    cols="20" rows="10"></textarea>
                            </div>
                        </form>
                    </div>

                @else
                    <div class="show-address-user-checkout">
                        <div class="show-address-user-checkout-content">
                            <div class="show-address-user-checkout-title">آدرس تحویل سفارش</div>
                            <form action="{{ route('orders.store') }}" method="post" id="send-info-checkout">
                                @csrf
                                <ul class="show-address-user-checkout-items">
                                    <input type="hidden" name="shopping_address" value="{{ $address->address }}">
                                    <li><i class="far fa-map-marked-alt"></i> {{ $address->address }}</li>

                                    <input type="hidden" name="shopping_fullname" value="{{ $address->fullname }}">
                                    <li><i class="far fa-user"></i> {{ $address->fullname }}</li>

                                    <input type="hidden" name="shopping_phone" value="{{ $address->phone }}">
                                    <li><i class="far fa-phone"></i> {{ $address->phone }}</li>

                                    <input type="hidden" name="shopping_zipcode" value="{{ $address->zipcode }}">
                                    <li><i class="far fa-mailbox"></i> {{ $address->zipcode }}</li>

                                    <input type="hidden" name="shopping_state" value="{{ $address->state }}">
                                    <input type="hidden" name="shopping_city" value="{{ $address->city }}">

                                    <!-- Button trigger modal -->
                                    <li><a href="{{ route('edit.checkout.page', $address->id) }}">ویرایش آدرس</a></li>
                                </ul>
                            </form>

                        </div>
                    </div>
                @endif


            </div>


            <div class="pay-section-checkout">
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
                            <button class="btn btn-danger w-100" form="send-info-checkout">پرداخت نهایی</button>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="c-checkout-submit">
                <button class="c-checkout-submit__btn" form="send-info-checkout">
                    پرداخت نهایی
                </button>
                <div class="c-checkout-submit__price">
                    <div class="c-checkout-submit__price-info-title">مبلغ قابل پرداخت : </div>
                    <div class="js-price">{{ number_format(\Cart::getTotal()) }}</div>
                    <span>تومان</span>
                </div>
            </div>
        </div>
    </div>

    @push('checkoutPageScripts')
    <script>
        $(document).ready(function () {
            $('select[name="shopping_state"]').on('change', function () {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: 'checkout/getCity/'+state_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var str = "";
                            data.forEach(item => {
                                // console.log(data)
                                str += '<option value="' + item.name + '">' + item.name + '</option>'
                            });
                            document.getElementById('shopping_city').innerHTML = str;
                        }
                    });
                }
            });
            $('#shopping_city').select2({});
            $('#shopping_state').select2({});
        });

    </script>
    @endpush
@endsection
