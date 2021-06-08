@extends('front.index')
@section('content')

@section('title')


{{ $titleProduct }}

@endsection



    <section id="top-sale">
        <div class="container-fluid">
            <br>
            <br>
            <br>
            <br>
            {{-- Start product lost --}}

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
                                                    <span class="price product-price">{{ $product->price }} ریال</span>
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



                    </div>

            {{-- END product lost --}}


            {{-- Start Article lost --}}

                    <div class="items-article-show-category">

                        <ul class="article_list">
                            @foreach ($articles as $article)
                                <li>
                                    <div class="article-item">
                                        <div class="panel-custom article-item-contents">
                                            <a href="{{ route('article.show.page', $article->slug) }}">
                                                <div class="panel-body-custom">
                                                    <img width="275" height="200" src="{{ $article->index_image }}" alt="">
                                                </div>
                                            </a>
                                            <div class="article-item-footer">
                                                <h4>{{ $article->name }}</h4>
                                                <div class="btns-action-article-item d-flex align-items-center justify-content-between">
                                                    <div class="like-article-item d-flex">

                                                    </div>
                                                    <a class="btn d-flex align-items-center" href="{{ route('article.show.page', $article->slug) }}">ادامه مطلب&nbsp;<i class="fas fa-chevron-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {{ $articles->links() }}
                    </div>

            {{-- END Article lost --}}
        </div>
    </section>

@endsection
