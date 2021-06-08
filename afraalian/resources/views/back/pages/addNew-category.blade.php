@extends('back.index')
@section('contentAdmin')

<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
            <div class="justify-content-center anime fade-in-y fast forgot row">
                <div class="box-input-auth p-3 rounded col-9 col-sm-7 col-md-5 col-lg-4">
                    <div class="">
                        <form action="{{ route('createNewCategories.admin.panel') }}" method="post">
                            @csrf
                            <div class="input-fild-box form-group">
                                <label for="">عنوان</label>
                                <input type="text" class="mt-2 form-control @error('title') is-invalid @enderror " placeholder="عنوان" value="{{old('title')}}"
                                    name="title" id="">
                                    @error('title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>

                            <div class="input-fild-box form-group">
                                <label for="">لینک</label>
                                <input type="text" class="mt-2 form-control @error('slug') is-invalid @enderror " placeholder="لینک" value="{{old('slug')}}"
                                    name="slug" id="">
                                    @error('slug')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>

                            <div class="input-fild-box form-group">
                                <label for="">توضیحات</label>
                                <textarea class="mt-2 form-control @error('description') is-invalid @enderror" placeholder="توضیحات" value="{{old('description')}}"
                                    name="description" id=""></textarea>
                                    @error('description')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>



                            <div class="input-fild-box form-group">
                                <label for="">وضعیت</label>
                                <select class="form-control" name="active">
                                    <option value="1">تایید شده</option>
                                    <option value="0">تایید نشده</option>
                                </select>
                            </div>

                            <div class="input-fild-box form-group">
                                <label for="">انخاب دسته بندی پدر</label>
                                <select class="form-control" name="parent_id">
                                    <option value="">ندارد</option>
                                    @foreach ($parentCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-fild-box form-group">
                                <button type="submit" class="btn btn-success w-100">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
