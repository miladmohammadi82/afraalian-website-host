@extends('back.index')
@section('contentAdmin')

    <main class="client-page">
        <div class="d-flex align-items-center">
            <div class="container">

                        <div class="">
                            <form action="{{ route('storeNew.product.admin.panel') }}" method="post">
                                @csrf
                                <div class="input-fild-box form-group">
                                    <label for="">نام محصول</label>
                                    <input type="text" class="mt-2 form-control @error('name') is-invalid @enderror "
                                        placeholder="نام محصول" value="{{ old('name') }}" name="name" id="">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">لینک</label>
                                    <input type="text" class="mt-2 form-control @error('slug') is-invalid @enderror"
                                        placeholder="لینک" value="{{ old('slug') }}" name="slug" id="">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">قیمت محصول</label>
                                    <input type="text" class="mt-2 form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price') }}" placeholder="قیمت محصول" name="price" id="">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">قیمت قبلی محصول</label>
                                    <input type="text" class="mt-2 form-control @error('previous_price') is-invalid @enderror"
                                        value="{{ old('previous_price') }}" placeholder="قیمت قبلی محصول" name="previous_price" id="">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">توضیحات</label>
                                    <textarea id="editor" class="mt-2 form-control @error('description') is-invalid @enderror"
                                        placeholder="توضیحات" name="description" id="">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="input-fild-box form-group">
                                    <label for="">انتخاب دسته بندی</label>
                                    <select class="chosen-select form-control" value="{{ old('categories[]') }}" placeholder="دسته بندی را انتخاب کنید" name="categories[]" multiple>
                                        @foreach ($categories as $cat_id => $cat_name)
                                            <option value="{{ $cat_id }}">{{ $cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">تصویر شاخص</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> انتخاب
                                        </a>
                                        </span>
                                        <input id="thumbnail" value="{{ old('index_image') }}" @error('index_image') is-invalid @enderror class="form-control" type="text" name="index_image">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;" />
                                    @error('index_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-fild-box form-group">
                                    <label for="">تصویر های گالری</label>
                                    <div class="list-group-item">

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                            <a id="lfm-gl" data-input="thumbnail-gl" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> انتخاب
                                            </a>
                                            </span>
                                            <input id="thumbnail-gl" value="{{ old('image_gallery1') }}" @error('image_gallery1') is-invalid @enderror class="form-control" type="text" name="image_gallery1">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;" />
                                        @error('image_gallery1')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="list-group-item">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                            <a id="lfm-gl2" data-input="thumbnail-gl2" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> انتخاب
                                            </a>
                                            </span>
                                            <input id="thumbnail-gl2"  value="{{ old('image_gallery2') }}" @error('image_gallery2') is-invalid @enderror class="form-control" type="text" name="image_gallery2">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;" />
                                        @error('image_gallery2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="list-group-item">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                            <a id="lfm-gl3" data-input="thumbnail-gl3" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> انتخاب
                                            </a>
                                            </span>
                                            <input id="thumbnail-gl3" value="{{ old('image_gallery3') }}" @error('image_gallery3') is-invalid @enderror class="form-control" type="text" name="image_gallery3">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;" />
                                        @error('image_gallery3')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-fild-box form-group">
                                    <button type="submit" class="btn btn-success w-100">ورود</button>
                                </div>

                                <ul class="login-link">
                                    <li>
                                        <router-link to="/login"><i class="fas fa-user"></i>&nbsp;وارد شوید</router-link>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>

        </div>
    </main>

@endsection
