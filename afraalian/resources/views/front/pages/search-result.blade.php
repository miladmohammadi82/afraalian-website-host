@extends('front.index')
@section('content')
<section id="top-sale">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>



            @if (!request()->input('query'))
                <p class="alert alert-danger">محصولی پیدا نشد</p>
            @else


                <div class="result-text">
                    <h1>  جستجو "{{ request()->input('query') }}"</h1>
                </div>
                <p class="alert alert-warning">{{ $count }} مورد پیدا شد </p>
                <div class="items-product-show-category">



                    <ul class="product_list">
                        @foreach ($products as $product)

                            <li>
                                <div class="product-container">
                                    <div class="pro_first_box">
                                        <div class="product_img_link">
                                            <a href="{{ route('show.product.index.page', $product->slug) }}">
                                                <img class="img-responsive front-image " src="{{ $product->index_image }}"
                                                    alt="{{ $product->name }}" title="{{ $product->name }}" width="273"
                                                    height="273">
                                            </a>
                                        </div>
                                        <div class="pro_second_box">
                                            <div class="s_title_block">
                                                <a href="{{ route('show.product.index.page', $product->slug) }}"
                                                    class="product-name">{{ $product->name }}</a>
                                            </div>
                                            <div class="price_container">
                                                <span class="price product-price">{{ number_format($product->price) }} تومان</span>
                                            </div>

                                        </div>
                                        <form action="{{ route('carte.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="index_image" value="{{ $product->index_image }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <input type="hidden" name="quantity" value="1">

                                            <input type="submit" class="btn addtocart-btn cursor-pointer mb-4 mt-3"
                                                value="افزودن به سبد" accesskey="s">
                                        </form>
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{-- @foreach ($products as $product)


                    <div class="product">
                        <a href="#"><img src="{{ $product->index_image }}"></a>
                        <div class="title-product mt-2">
                            <h6>{{ $product->title }}</h6>
                            <div class="price py-3">
                                <p>تومان</p>&nbsp;<span>{{ $product->price }}</span>
                            </div>
                            <div class="btn-shoping-card">
                                <button class="btn-register-system" style="width: 110px;"><i
                                        class="far fa-plus"></i>&nbsp;&nbsp;<small>افزودن به سبد</small></button>
                            </div>
                        </div>
                    </div>


                @endforeach --}}
            @endif
        </div>
    </div>
</section>

@endsection
