
@extends('front.index')
@section('content')

@section('title')
    {{ $title }}
@endsection

<main class="main-site">

        <section class="banner-arias" id="banner-aria">
            <div class="container-fluid">
                <div class="swiper-container img">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="w-100" style="border-radius: 20px" src="{{ asset('assets/slider/banner1.jpg') }}" >
                        </div>
                        <div class="swiper-slide">
                            <img class="w-100" style="border-radius: 20px" src="{{ asset('assets/slider/banner2.jpg') }}" >
                        </div>
                        <div class="swiper-slide">
                            <img class="w-100" style="border-radius: 20px" src="{{ asset('assets/slider/banner3.jpg') }}" >
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-white"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>
        </section>

        <!-- Start servisess -->
        <div class="container-fluid">
            <div class="servisess">
                <div class="items-servisess">
                    <div class="servisess-item">
                        <div class="aio-icon-default">
                            <img width="100px" src="../assets/image-servisess/free-send.svg" alt="">
                        </div>

                        <div class="aio-icon-header">
                            <p>ارسال رایگان</p>
                        </div>

                        <div class="aio-icon-description">
                            <small>
                                ارسال رایگان در سراسر کشور درب منزل
                            </small>
                        </div>
                    </div>

                    <div class="servisess-item">
                        <div class="aio-icon-default">
                            <img width="100px" src="../assets/image-servisess/rerurn-product.svg" alt="">
                        </div>

                        <div class="aio-icon-header">
                            <p>ضمانت بازگشت وجه</p>
                        </div>

                        <div class="aio-icon-description">
                            <small>
                                اگه از عسلمون راضی نبودید پولتون رو بر میگردونیم
                            </small>
                        </div>
                    </div>

                    <div class="servisess-item">
                        <div class="aio-icon-default">
                            <img width="100px" src="../assets/image-servisess/support-24.svg" alt="">
                        </div>

                        <div class="aio-icon-header">
                            <p>پشتیبانی بسیار سریع</p>
                        </div>

                        <div class="aio-icon-description">
                            <small>
                                در 24 ساعت شبانه روز در خدمتتون هستیم
                            </small>
                        </div>
                    </div>

                    <div class="servisess-item">
                        <div class="aio-icon-default">
                            <img width="100px" src="../assets/image-servisess/tarxk-time.svg" alt="">
                        </div>

                        <div class="aio-icon-header">
                            <p>ارسال سریع</p>
                        </div>

                        <div class="aio-icon-description">
                            <small>
                                ارسال بسیار سریع
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End servisess -->

        <!-- Start Slider product -->
        <br>
        <br>
        <section id="top-sale">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <span>محصولات ما</span>
                        </h4>

                        <div class="card-body">
                            <div class="owl-carousel owl-theme">

                                @foreach ($products as $product)
                                <div class="product-item">

                                        <div class="panel-custom">
                                            <a href="{{ route('show.product.index.page', $product->slug) }}">
                                                <div class="panel-body-custom">
                                                    <img src="{{ $product->index_image }}" alt="">
                                                </div>

                                            <div class="footer-section-product card-footer panel-footer-custom">


                                                <h4>{{ $product->name }}</h4>
                                                @if (!is_null($product->previous_price))
                                                    <p><del class="text-danger" style="font-size: 13px">{{ number_format($product->previous_price) }}تومان</p></del>
                                                @endif

                                                <p><span>{{ number_format($product->price) }}</span>&ThinSpace;تومان</p>

                                            </a>
                                                <form action="{{ route('carte.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="index_image" value="{{ $product->index_image }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <input type="hidden" name="quantity" value="1">

                                                    <input type="submit" class="btn addtocart-btn cursor-pointer" value="افزودن به سبد" accesskey="s">
                                                </form>




                                            </div>


                                        </div>

                                </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-- END Slider product -->
<br>
        <section id="top-sale">
            <div class="container">
                <ul class="banner-content">
                    <li class=""><img src="{{ asset('assets/banerImages/1605524293_A0pK4.png') }}" alt=""></li>
                    <li class=""><img src="{{ asset('assets/banerImages/1605524293_A0pK4.png') }}" alt=""></li>
                </ul>
            </div>
        </section>
        <br>

        <!-- Start Slider product --> --}}

{{--
        <section id="top-sale">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <span>محصولات پربازدید</span>
                        </h4>

                        <div class="card-body">
                            <div class="owl-carousel owl-theme">
                                @foreach ($productsporbazdid as $productporbazdid)
                                    <div class="product-item">
                                        <a href="#">
                                            <div class="panel-custom">
                                                <div class="panel-body-custom">
                                                    <img src="{{ $productporbazdid->index_image }}" alt="">
                                                </div>
                                                <div class="footer-section-product card-footer panel-footer-custom">
                                                    <h4>{{ $productporbazdid->name }}</h4>
                                                    <p><span>{{ $productporbazdid->price }}</span>&ThinSpace;تومان</p>
                                                    <button class="btn addtocart-btn" >افزودن به سبد</button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <!-- END Slider product -->



{{-- Start Slider Blog --}}

<section id="top-sale">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h4>
                    <span>مطالب پربازدید</span>
                </h4>

                <div class="card-body">
                    <div class="owl-carousel owl-theme">
                        @foreach ($articlesPorbazdid as $articlePorbazdid)
                            <div class="article-item">
                                <div class="panel-custom article-item-contents">
                                    <a href="{{ route('article.show.page', $articlePorbazdid->slug) }}">
                                        <div class="panel-body-custom">
                                            <img width="700" height="466" src="{{ $articlePorbazdid->index_image }}" alt="">
                                        </div>
                                    </a>
                                    <div class="article-item-footer">
                                        <h4>{{ $articlePorbazdid->name }}</h4>
                                        <div class="btns-action-article-item d-flex align-items-center justify-content-sm-around">
                                            <div class="like-article-item d-flex">
                                                <a>
                                                    <div class="harts-like">
                                                    <i class="fal fa-heart text-danger single-page__like @if($articlePorbazdid->is_user_liked) fas @endif"></i>
                                                </div></a>                                            </div>
                                            <a class="btn d-flex align-items-center" href="{{ route('article.show.page', $articlePorbazdid->slug) }}">ادامه مطلب&nbsp;<i class="fas fa-chevron-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

@endsection
@push('scripts')


    <script>
        $(".single-page__like").click(function () {
            fetch('{{ route("like.post", $articlePorbazdid->slug) }}', {
                method: "post",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            })

            .then(()=> {
                $(this).toggleClass("fas")
            })

        })
    </script>

@endpush
