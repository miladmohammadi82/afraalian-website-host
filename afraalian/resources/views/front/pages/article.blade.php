@extends('front.index')
@section('content')
@section('title')
    {{ $title }}
@endsection

@section('metaTags')
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $article->name }}"/>
    <meta property="og:image" content="{{ $article->index_image }}"/>
    <meta property="og:url" content="https://afraalian.com/article/{{ $article->slug }}"/>
    <meta property="og:site_name" content="افرا آلیان"/>
@endsection

<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">

    <div class="sections_group">

        <div class="d-flex align-items-center justify-content-between">
            <div class="group d-flex align-items-baseline">
                <div class="y_ic">
                    <i class="far fa-file-signature"></i>
                </div>
                <div class="article-title">
                    <h2>{{ $article->name }}</h2>
                </div>
            </div>
            <div class="like-article-item d-flex">
                <a>
                    <div class="harts-like">
                    <a @guest href="{{ route('redirect.auth.like.post') }}" @endguest class="fal fa-heart text-danger single-page__like fa-2x @if($article->is_user_liked) fas @endif"></a>
                </div></a>&nbsp;
                <div class="count-like-article" style="color: #444;">{{ $articleCount }}</div>
            </div>



        </div>
        <div class="description-article">
            <h2>{!! $article->description !!}</h2>
        </div>
        <br>
        <hr>
        <br>
        <div class="writerStyleBox">
            <div class="sourcelinkpost">
                <ul>
                    <li> <i class="far fa-file-signature fa-lg"></i> نویسنده : {{ $article->user->name }} </li>
                    <br>
                    <li> <i class="far fa-exclamation-circle fa-lg"></i> منبع : افرا آلیان</li>
                    <br>
                    <li><a href="https://modiresabz.com/wp-content/uploads/2021/01/26396n.pdf" class="btn green_bt">دانلود PDF</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Start Slider Blog --}}
    <div class="content-comment-tab">
        <h1 class="title-comment-tab">نقد و برسی</h1>
        <br>
        <br>

        @include('back.pages.layouts.message')
        <br>
        @auth
            <form action="{{ route('create.new.comment-article', $article->id) }}" method="POST">
                @csrf
                <div class="comment-text">
                    <label for="body">نظر شما</label>
                    <div class="form-group">
                        <textarea placeholder="نظر خود را بنویسید..." name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </div>
            </form>
        @endauth

        @guest
            <p>برای ارسال نظر باید ابتدا <a href="{{ route('login') }}">وارد</a> شوید</p>
        @endguest

        <div class="product-comments pt-5">
            @include('front.pages.comments.comment', ['comments' => $article->comments, 'article' => $article])
        </div>

    </div>

    {{-- Start Comments --}}



    {{-- END Comments --}}

<section id="top-sale">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h4>
                    <span>جدید ترین مطالب</span>
                </h4>

                <div class="card-body">
                    <div class="owl-carousel owl-theme">
                        @foreach ($articlesNew as $articleNew)
                            <div class="article-item">
                                <div class="panel-custom article-item-contents">
                                    <a href="{{ route('article.show.page', $articleNew->slug) }}">
                                        <div class="panel-body-custom">
                                            <img width="700" height="466" src="{{ $articleNew->index_image }}" alt="">
                                        </div>
                                    </a>
                                    <div class="article-item-footer">
                                        <h4>{{ $articleNew->name }}</h4>
                                        <div class="btns-action-article-item d-flex align-items-center justify-content-sm-around">
                                            <div class="like-article-item d-flex">
                                                <a>
                                                    <div class="harts-like">
                                                    <i class="fas fa-heart text-danger"></i>
                                                </div></a>&nbsp;
                                                <div class="count-like-article" style="color: #444;">{{ $articleCount }}</div>
                                            </div>
                                            <a class="btn d-flex align-items-center" href="{{ route('article.show.page', $articleNew->slug) }}">ادامه مطلب&nbsp;<i class="fas fa-chevron-left"></i></a>
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

{{-- END Slider Blog --}}

</div>

@endsection

@push('styles')
    <style>
        img{
            max-width: 100%;
        }


    </style>
@endpush

@push('scripts')
    <script>
        $(".single-page__like").click(function () {
            fetch('{{ route("like.post", $article->slug) }}', {
                method: "post",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            }).then(()=> {
                $(this).toggleClass("fas")
            })

        })
    </script>
@endpush


