@extends('back.index')
@section('contentAdmin')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                @include('back.pages.layouts.message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">کاربران این وبسایت</h3>
                        <a href="{{ route('newUser.admin.panel') }}" class="btn btn-success mt-4">
                            <i class="fas fa-user-plus"></i>&nbsp;افزودن کاربر
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
                                    <th>کاربر</th>
                                    <th>تاریخ ثبت نام</th>
                                    <th>وضعیت</th>
                                    <th>نقش</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach ($users as $user)
                                    <tr >
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td><span class="badge badge-success">تایید شده</span></td>
                                        <td>
                                            @if ($user->role == 3)
                                                <span class="badge badge-secondary">کاربر ساده</span>
                                            @endif
                                            @if ($user->role == 2)
                                                <span class="badge badge-info">ادمین</span>
                                            @endif
                                            @if ($user->role == 1)
                                                <span class="badge badge-warning">مالک</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('editUser.admin.panel' ,$user->id) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>&nbsp;
                                            <form method="POST" action="{{ route('destroyUser.admin.panel', $user->id) }}">
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
