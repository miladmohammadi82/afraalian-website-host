@extends('back.index')
@section('contentAdmin')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            @include('back.pages.layouts.message')
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
                                <th>کد پستی</th>
                                <th>برای کاربر</th>
                                <th>شماره تماس</th>
                                <th>آدرس کامل</th>
                                <th>آیدی کاربر</th>
                            </tr>
                            @foreach ($addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>{{ $address->zipcode }}</td>
                                    <td>{{ $address->fullname }}</td>
                                    <td>{{ $address->phone }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->user_id }}</td>
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
