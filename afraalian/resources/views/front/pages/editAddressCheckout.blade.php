@extends('front.index')
@section('content')

<div class="container-fluid d-flex justify-content-center">

    <div class="content-checkout-edit-addressPage">
        <div class="edit-box-header">
            <div class=""><h5>ویرایش جزئیات آدرس</h5></div>
        </div>

        <div class="edit-box-body">
            <form action="{{ route('update.checkout.page', $address->id) }}" method="post" id="send-info-checkout">
                @csrf
                <div class="form-group group col-lg-12 w-100  mt-4">
                    <input class="input-checkout-priduct-info w-100" value="{{ $address->fullname }}" name="shopping_fullname" type="text" required>
                    <span class="bar"></span>
                    <label class="label-checkout-priduct-info"><i class="fas fa-user"></i> نام و نام
                        خانوادگی*</label>
                    @error('shopping_fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group group col-lg-12 w-100  mt-4">
                    <input class="input-checkout-priduct-info w-100" value="{{ $address->address }}" name="shopping_address" type="text"
                        required>
                    <span class="bar w-100"></span>
                    <label class="label-checkout-priduct-info w-100"><i class="fas fa-map-marker-alt"></i> آدرس*
                    </label>
                    @error('shopping_address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="select-divs-addres mt-3">
                    <div class="form-group group col-lg-6 col-sm-12 col-md-12">
                        <label for="" class="pb-2" style="color: #7e7e7e">استان*</label>
                        <div class="search-select-box">
                            <select class="chosen-select-option"
                                name="shopping_state" data-live-search="true">
                                <option value="1">گیلان</option>
                                <option value="2">تهران</option>
                                <option value="3">اهواز</option>
                                <option value="4">گلستان</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group group col-lg-6 col-sm-12 col-md-12">
                        <label for="" class="pb-2" style="color: #7e7e7e">شهر*</label>

                        <div class="search-select-box">
                            <select class="chosen-select-option" name="shopping_city" id=""
                                data-live-search="true">
                                <option value="1">گیلان</option>
                                <option value="2">تهران</option>
                                <option value="3">اهواز</option>
                                <option value="4">گلستان</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group group col-lg-12 w-100  mt-4">
                    <input class="input-checkout-priduct-info w-100" value="{{ $address->zipcode }}" name="shopping_zipcode" type="text"
                        required>
                    <span class="bar w-100"></span>
                    <label class="label-checkout-priduct-info w-100"><i class="fas fa-location-arrow"></i> کد
                        پستی* </label>
                    @error('shopping_zipcode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group group col-lg-12 w-100  mt-4">
                    <input class="input-checkout-priduct-info w-100" value="{{ $address->phone }}" name="shopping_phone" type="text" required>
                    <span class="bar w-100"></span>
                    <label class="label-checkout-priduct-info w-100"><i class="fas fa-phone-alt"></i> شماره
                        تماس* </label>
                    @error('shopping_phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="btn-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        ویرایش
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
