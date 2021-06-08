@extends('back.index')
@section('contentAdmin')

<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
            <div class="justify-content-center anime fade-in-y fast forgot row">
                    <div class="">
                        <form action="{{ route('update.product-comment.admin.panel', $comment->id) }}" method="post">
                            @csrf
                            <div class="input-fild-box form-group">
                                <label for="">نام نویسنده</label>
                                <input type="text" class="mt-2 form-control @error('name') is-invalid @enderror " placeholder="عنوان" value="{{ $comment->name }}"
                                    name="name" id="">
                                    @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>
                            <div class="input-fild-box form-group">
                                <label for="">ایمیل نویسنده</label>
                                <input type="text" class="mt-2 form-control @error('email') is-invalid @enderror " placeholder="لینک" value="{{ $comment->email }}"
                                    name="email" id="">
                                    @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>
                            <div class="input-fild-box form-group">
                                <label for="">متن نظر</label>
                                <textarea class="mt-2 form-control @error('body') is-invalid @enderror" placeholder="توضیحات"
                                    name="body" id="">{{ $comment->body }}</textarea>
                                    @error('body')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>

                            <div class="input-fild-box form-group">
                                <button type="submit" class="btn btn-success w-100">ثبت</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</main>

@endsection
