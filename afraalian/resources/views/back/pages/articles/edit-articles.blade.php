@extends('back.index')
@section('contentAdmin')

    <main class="client-page">
        <div class="d-flex align-items-center">
            <div class="container">
                <div class="">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('articles.update.admin.panel', $articles->id) }}" method="post">
                        @csrf
                        <div class="input-fild-box form-group">
                            <label for="">نام مطلب</label>
                            <input type="text" class="mt-2 form-control @error('name') is-invalid @enderror "
                                placeholder="نام محصول" value="{{ $articles->name }}" name="name" id="">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="input-fild-box form-group">
                            <label for="">لینک</label>
                            <input type="text" class="mt-2 form-control @error('slug') is-invalid @enderror"
                                placeholder="لینک" value="{{ $articles->slug }}" name="slug" id="">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">تعداد بازدید</label>
                            <input type="text" class="mt-2 form-control @error('hit') is-invalid @enderror"
                            value="{{ $articles->hit }}" placeholder="تعداد بازدید" name="hit" id="">
                            @error('hit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">توضیحات</label>
                            <textarea id="editor" class="mt-2 form-control @error('description') is-invalid @enderror"
                                placeholder="توضیحات" name="description" id="">{{ $articles->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">انتخاب دسته بندی</label>
                            <select class="chosen-select form-control" placeholder="دسته بندی را انتخاب کنید" name="categories[]" multiple>
                                @foreach ($categories as $cat_id => $cat_name)
                                    <option value="{{ $cat_id }}">{{ $cat_name }}</option>
                                @endforeach
                            </select>



                        </div>

                        <div class="input-fild-box form-group">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        </div>


                        <div class="input-fild-box form-group">
                            <label for="">تصویر شاخص</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> انتخاب
                                </a>
                                </span>
                                <input id="thumbnail" value="{{ $articles->index_image }}" @error('index_image') is-invalid @enderror class="form-control" type="text" name="index_image">
                            </div>
                            <img id="holder" src="{{ $articles->index_image }}" style="margin-top:15px;max-height:100px;" />
                            @error('index_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <button type="submit" class="btn btn-success w-100">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
