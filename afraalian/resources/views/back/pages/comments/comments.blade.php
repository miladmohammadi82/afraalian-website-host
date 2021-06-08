@extends('back.index')
@section('contentAdmin')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                @include('back.pages.layouts.message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">دسته بندی نظرات</h3>

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
                                    <th>نظر</th>
                                    <th>نویسنده</th>
                                    <th>برای محصول</th>
                                    <th>وضعیت</th>
                                    <th>تارییخ ساخت</th>
                                </tr>
                                @foreach ($product_comments as $comment)
                                    <tr>
                                        <td>{{ $comment->body }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->product_id }}</td>
                                        <td>{{ $comment->replies_count }}</td>
                                        <td>
                                            @if ($comment->status == 1)
                                                <a href="{{ route('editComment.product-comment.admin.panel', $comment->id) }}" class="border-0"><span class="badge badge-success">تایید شده</span></a>
                                            @endif
                                            @if ($comment->status == 0)
                                                <a href="{{ route('editComment.product-comment.admin.panel', $comment->id) }}"><span class="badge badge-danger">تایید نشده</span></a>
                                            @endif

                                        </td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>
                                            <a href="{{ route('edit.product-comment.admin.panel', $comment->id) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>&nbsp;
                                            <form method="POST"
                                                action="{{ route('destroy.product-comment.admin.panel', $comment->id) }}">
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
