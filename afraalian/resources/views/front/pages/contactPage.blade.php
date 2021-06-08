@extends('front.index')
@section('content')

@section('title')
    {{ $title }}
@endsection

<div class="container container-cart-page">


    <div class="contact-form-box">
        <div class="item-mored-niaz-forPay">
            <div class="addres-girande-box">

                @include('back.pages.layouts.message')

                <br>

                <div class="title-contact-page">
                    <h5>تماس با فلانی</h5>
                </div>

                <div class="contact-form-filds ">
                    <form action="{{ route('store.contact.page') }}" method="POST" class="row">
                        @csrf
                        <div class="form-group col-lg-12">
                            <label for="">نام و نام خانوادگی <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name') }}" class="mt-2 form-control @error('name') is-invalid @enderror" placeholder="نام و نام خانوادگی" name="name" id="">

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="">ایمیل <span class="text-danger">*</span></label>
                            <input type="email" value="{{ old('email') }}" class="mt-2 form-control @error('email') is-invalid @enderror" placeholder="ایمیل" name="email" id="">

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="">تلفن تماس <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('phone') }}" class="mt-2 form-control @error('phone') is-invalid @enderror" placeholder="تلفن تماس" name="phone" id="">

                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-lg-12 ">
                            <label for="">متن پیام <span class="text-danger">*</span></label>
                            <textarea class="mt-2 form-control textarea-cantact-page @error('body') is-invalid @enderror"
                                placeholder="متن پیام خود را بنویسید ..." name="body" cols="30" rows="10">{{ old('body') }}</textarea>

                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        <div class="btn-save-info-edit-user">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                    </form>
                </div>

            </div>


            <div class="addres-contact-page">
                <h5><i class="far fa-map-signs fa-3x"></i>آدرس</h5>
                <div class="addres-box-contact-page pt-4 row">

                    <div class="addres-section-cotact-page col-lg-6 col-md-6 d-flex justify-content-center">
                        <p>
                            گیلان، صومعه سرا، گوراب زرمیخ، سه راهی طتف، نرسیده به مسجد
                        </p>
                    </div>
                    <div class="mt-sm-4 map-addres-section-cotact-page col-lg-6 col-md-6 d-flex justify-content-center">
                        <div class="map-box-addres"></div>
                    </div>


                </div>
            </div>


            <div class="router-contact-this-web">
                <h5>راه های ارتباط باما</h5>
                <div class="router-contact-items">
                    <ul>
                        <li class="col-lg-4">
                            <div class="icon-box-contact-page">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="title-contact-page">
                                <h6>تماس بگیرید</h6>
                                <small>013-34704745</small>
                            </div>
                        </li>

                        <li class="col-lg-4">
                            <div class="icon-box-contact-page">
                                <i class="far fa-at fa-2x"></i>
                            </div>
                            <div class="title-contact-page">
                                <h6>ایمیل</h6>
                                <small>info@afraalian.com</small>
                            </div>
                        </li>
                        <li class="col-lg-4">
                            <div class="icon-box-contact-page">
                                <i class="far fa-clock fa-2x"></i>
                            </div>
                            <div class="title-contact-page">
                                <h6>ساعت کاری</h6>
                                <small>۲۴ ساعت شبانه‌روز پاسخگوی شما هستیم</small>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

