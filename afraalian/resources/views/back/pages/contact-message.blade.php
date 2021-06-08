@extends('back.index')
@section('contentAdmin')


<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            @include('back.pages.layouts.message')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">پیام های دریافتی توسط کاربران</h3>
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
                                <th>نام و نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>تلفن تماس</th>
                                <th>متن پیام</th>
                            </tr>
                            @foreach ($contactMessages as $contactMessage)
                                <tr>
                                    <td>{{ $contactMessage->id }}</td>
                                    <td>{{ $contactMessage->name }}</td>
                                    <td>{{ $contactMessage->email }}</td>
                                    <td>{{ $contactMessage->phone }}</td>
                                    <td>{{ $contactMessage->body }}</td>
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
