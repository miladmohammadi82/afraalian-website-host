@extends('front.index')
@section('content')

@section('title')
    {{ $title }}
@endsection


@foreach ($products as $product)
    @section('metaTags')
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="{{ $product->name }}"/>
        <meta property="og:image" content="{{ $product->index_image }}"/>
        <meta property="og:url" content="https://afraalian.com/article/{{ $product->slug }}"/>
        <meta property="og:site_name" content="افرا آلیان"/>
    @endsection
@endforeach
<br><br><br><br><br>
<div class="container">
    <div class="bg-product" id="productslider">
        <div class="product-page-content">
            <div class="gallery-product">


                @foreach ($products as $product)



                    <div class="zoom-slider-ok">
                        <div class="zoom-slider-big-box" data-role="slider-big-box img-fluid" href="{{ $product->index_image }}">
                            <img src="{{ $product->image_gallery1 }}" id="show-img">
                        </div>

                    </div>
                    <div class="col-12">
                        <ol class="carousel-indicators position-sticky m-0">

                            <li data-target="#productslider" data-slid-to="0" class="active-tab-productslider">
                                <div class="data-slide-image">
                                    <img src="{{ $product->image_gallery3 }}" class="img-fluid show-small-img" alt="">
                                </div>
                            </li>

                            <li data-target="#productslider" data-slid-to="1" class="active-tab-productslider">
                                <div class="data-slide-image">
                                    <img src="{{ $product->image_gallery2 }}" class="img-fluid show-small-img" alt="">
                                </div>
                            </li>

                            <li data-target="#productslider" data-slid-to="2" class="active-tab-productslider">
                                <div class="data-slide-image">
                                    <img src="{{ $product->image_gallery1 }}" class="img-fluid show-small-img" alt="">
                                </div>
                            </li>
                        </ol>
                    </div>
                @endforeach

            </div>
            <div class="info-product">
                <div class="items-main-product-page">
                    <div class="title">
                        <h1 class="text-product">عسل آویشن 5 کیلویی</h1>
                    </div>
                    <div class="servisess-product-page">
                        <div class="help-syntax-order">
                            <div class="title-dropDown-help-syntax-order">
                                <div class="help-syntax-order-plus"><i class="far fa-plus"></i></div>
                                <div class="help-syntax-order-box">
                                    راهنمای سفارش
                                </div>
                            </div>

                            <div class="box-dropdown-help-order">
                                <p>
                                    جهت ثبت سفارش، ابتدا از منوی انتخاب وزن، وزن عسل مورد نظر خود و سپس تعداد مورد نظر
                                    خود را انتخاب کنید و روی دکمه افزودن به سبد خرید کلیک کنید. میتوانید این کار را برای
                                    افزودن وزن های دیگر به سبد خرید خود، تکرار کنید. سپس جهت تسویه حساب نهایی، وارد سبد
                                    خرید شوید.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="price-box-product-page">
                        {{ number_format($product->price) }}
                        <span>تومان</span>
                    </div>
                    <div class="count-number">
                        <div class="number__container">
                            <button @click="RemoveCountProductInProductPageForAddToCart" class="increment"><i
                                    class="far fa-minus"></i></button>
                            <input v-model="countProductInProductPageForAddToCart" form="add-to-cart" name="quantity"
                                max="10" min="1" class="quantity" type="number" inputmode="numeric"
                                placeholder="تعداد" />
                            <button @click="AddCountProductInProductPageForAddToCart" class="decrement"><i
                                    class="far fa-plus"></i></button>
                        </div>

                        <form action="{{ route('carte.store') }}" method="POST" id="add-to-cart">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="index_image" value="{{ $product->index_image }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">

                            <input type="submit" class="btn single_add_to_cart_button" value="افزودن به سبد خرید" />
                        </form>

                    </div>
                </div>
            </div>
        </div>





    </div>




</div>

<div class="container-fluid">
    <div class="tab">

        <div class="tab__wrapper">
            <!--input-area-->



                <input id="all" type="radio" name="tab_item" checked>
                <label class="tab_item" for="all"> <i class="far fa-book fa-lg"></i> توضیخات</label>

                <input id="pro" type="radio" name="tab_item">
                <label class="tab_item" for="pro"><i class="far fa-comments-alt fa-lg"></i> نظر کاربران ()</label>


                <!--input-area-->

            <!--text-area-->
            <div class="tab_content" id="all_content">
                <div class="tab_content_description">
                    <div class="items-description">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>

            <div class="tab_content" id="programming_content">
                <div class="tab_content_description">
                    <div class="content-comment-tab">
                        <div class="content-comment-tab">
                            <h1 class="title-comment-tab">نقد و برسی</h1>
                            <br>
                            <br>

                            @include('back.pages.layouts.message')
                            <br>
                            @auth
                                <form action="{{ route('create.new.comment-product', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="comment-text">
                                        <label for="body">نظر شما</label>
                                        <div class="form-group">
                                            <textarea placeholder="نظر خود را بنویسید..." name="body" id="body" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            @endauth

                            @guest

                                <p class="alert alert-warning">برای ارسال نظر باید ابتدا <a href="{{ route('login') }}"
                                        style="color: #0060af !important">وارد</a> شوید</p>
                            @endguest

                            <div class="product-comments pt-5">
                                @include('front.pages.comments.comment-product', ['comments' => $product->comments, 'product' =>
                                $product])
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <!--text-area-->
        </div>


    </div>
</div>


<div class="btn-div-fixed-addCart">


    <button type="submit" form="add-to-cart" class="btn-add-to-cart-productPage btn-mobile-add-cart"><i
            class="far fa-plus"></i>&nbsp;&nbsp; افزودن
        به سبد خرید</button>

</div>
</div>
@endsection
