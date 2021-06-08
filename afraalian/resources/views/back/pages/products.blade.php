@extends('back.index')
@section('contentAdmin')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                @include('back.pages.layouts.message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">محصولات این وبسایت</h3>
                        <a href="{{ route('newProductPage.admin.panel') }}" class="btn btn-success mt-4">
                            <i class="fas fa-user-plus"></i>&nbsp;افزودن محصول جدید
                        </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- /.card-header -->

                    <div id="loading">
                        <vue-simple-spinner class="mt4" size="large" message="Loading..."></vue-simple-spinner>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" style="font-size: 16px;">
                            <tbody>
                                <tr>
                                    <th>آیدی</th>
                                    <th>عنوان</th>
                                    <th>تصویر</th>
                                    <th>لینک</th>
                                    <th>دسته بندی ها</th>
                                    <th>وضعیت</th>
                                    <th>تارییخ ساخت</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img width="50px" height="50px" src="{{ $product->index_image }}"></td>
                                        <td>{{ $product->slug }}</td>
                                        <td>
                                            @foreach ($product->categories()->pluck('title') as $category)
                                            <span class="badge badge-dark">{{ $category }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($product->active == 1)
                                                <a href="{{ route('editActive.product.admin.panel', $product->id) }}"
                                                    class="border-0"><span class="badge badge-success">تایید شده</span></a>
                                            @endif
                                            @if ($product->active == 0)
                                                <a href="{{ route('editActive.product.admin.panel', $product->id) }}"><span
                                                        class="badge badge-danger">تایید نشده</span></a>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('edit.product.admin.panel', $product->id) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>&nbsp;
                                            <form method="POST"
                                                action="{{ route('destroy.product.admin.panel', $product->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>



        </div>

    </div>


@endsection
