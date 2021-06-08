@extends('back.index')
@section('contentAdmin')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            @include('back.pages.layouts.message')
            <a class="btn btn-primary" href="{{ route('articles.create.admin.panel') }}">افزودن</a>
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">آدرس های کاربران</h3>

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
                                <th>تصویر</th>
                                <th>نام مطلب</th>
                                <th>نویسنده</th>
                                <th>تعداد بازدیدها</th>
                                <th>دسته بندی ها</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td><img src="{{ $article->index_image }}" alt="" height="50" width="50"></td>
                                    <td>{{ $article->name }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->hit }}</td>
                                    <td>
                                        @foreach ($article->categories()->pluck('title') as $category)
                                            <span class="badge badge-dark">{{ $category }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($article->status == 1)
                                            <a href="{{ route('articles.edit.status.admin.panel', $article->id) }}" class="border-0"><span class="badge badge-success">تایید شده</span></a>
                                        @endif
                                        @if ($article->status == 0)
                                            <a href="{{ route('articles.edit.status.admin.panel', $article->id) }}"><span class="badge badge-danger">تایید نشده</span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('articles.edit.admin.panel', $article->id) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>&nbsp;
                                        <form method="POST"
                                            action="{{ route('articles.delete.admin.panel', $article->id) }}">
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
