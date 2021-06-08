@extends('back.index')
@section('contentAdmin')

<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
            <div class="justify-content-center anime fade-in-y fast forgot row">
                <div class="box-input-auth p-3 rounded col-9 col-sm-7 col-md-5 col-lg-4">

                    <div class="">
                        <form action="{{ route('updateUser.admin.panel', $user->id) }}" method="post">
                            @csrf
                            <div class="input-fild-box form-group">
                                <label for="">نام</label>
                                <input type="text" class="mt-2 form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" placeholder="نام" name="name" id="">
                                @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="input-fild-box form-group">
                                <label for="">ایمیل</label>
                                <input type="email" class="mt-2 form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="ایمیل" name="email" id="">
                                @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="input-fild-box form-group">
                                <label for="">تلفن همراه</label>
                                <input type="text" class="mt-2 form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" placeholder="نام کاربری" name="phone"
                                    id="">
                                    @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                            </div>



                            <div class="input-fild-box form-group">
                                <label for="">چیکارست ؟</label>
                                <select class="form-control" name="role" id="cars">
                                    <optgroup label="Swedish Cars">
                                        <option value="3" @if ($user->role == 3) selected @endif id="cars">کاربر ساده</option>
                                        <option value="2" @if ($user->role == 2) selected @endif id="cars">ادمین</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="input-fild-box form-group">
                                <label for="">رمز عبور</label>
                                <input type="password" v-model="form.password" class="mt-2 form-control"
                                    placeholder="رمز عبور" name="password" id="">
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
        </div>
    </div>
</main>

@endsection
