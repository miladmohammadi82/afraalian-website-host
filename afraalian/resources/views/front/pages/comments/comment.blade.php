


@foreach ($comments as $comment)
    <div class="product-commentRow" id="product-commentRow">
        <div class="product-comment">

            <img class="avatar" alt="" src="{{ asset('assets/images_min/d41d8cd98f00b204e9800998ecf8427e-min.jpg') }}" width="64" height="64">
            <div class="flex-grow-1 mt-4" style="padding-right: 10px">

                    <div class="mb-2">
                        <h6 class="ml-2 mb-0 name-user-product-comment">{{ $comment->name }}</h6>
                    </div>
                    <div>
                        <span class="commentContent">{{ $comment->body }}</span>
                        <a class="replyItem" id="replyItem" style="float: left;padding: 30px 0 0 0;">
                            پاسخ به نظر
                        </a>
                        <form action="{{ route('create.new.replay-article') }}" method="POST" class="reply-comment-product mt-4">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">

                            <div class="form-group">
                                <label for="" class="pb-2">پاسخ خود را بنویسید...</label>
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-dark">ارسال</button>
                            </div>
                        </form>
                    </div>


                @include('front.pages.comments.comment', ['comments' => $comment->replies])

            </div>


        </div>
    </div>
@endforeach
