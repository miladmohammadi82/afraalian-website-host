@extends('profile.index')
@section('adminContent')

<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <h1 class="cathea">
        <span class="catheadlin">
            نظران محصولات
        </span>
    </h1>

    @if (!$comments)
        <br>
        <div class="alert alert-danger">شماهیچ نظری برای محصولات ثبت نکرده اید</div>
    @endif
    <table class="content-table">
        <thead>
            <tr>
                <th>نام نویسنده</th>
                <th>ایمیل نویسنده</th>
                <th>متن نظر</th>
                <th>وضغیت</th>

            </tr>
        </thead>
        <tbody class="tbody-mobile">
            @foreach ($comments as $comment)


            <tr class="comment-table-mobile">
                <td class="comment-table-mobile-td">
                    <h4>نام نویسنده</h4>&nbsp;
                    {{ $comment->name }}
                </td>
                <td class="comment-table-mobile-td">
                    <h4>ایمیل نویسنده</h4>&nbsp;
                    {{ $comment->email }}
                </td>
                <td class="comment-table-mobile-td">
                    <h4>متن نظر</h4>
                    {{ $comment->body }}
                </td>
                <td class="comment-table-mobile-td">
                    <h4>وضغیت</h4>&nbsp;
                    @if ($comment->status == 1)
                        <span><span class="badge badge-success">تایید شده</span></span>
                    @endif
                    @if ($comment->status == 0)
                        <span><span class="badge badge-danger">تایید نشده</span></span>
                    @endif
                </td>

            </tr>




            @endforeach
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h1 class="cathea">
        <span class="catheadlin">
            نظران مطالب
        </span>
    </h1>
    @if (!$articlesComment)
    <br>
        <div class="alert alert-danger">شماهیچ نظری برای مطالب ثبت نکرده اید</div>
    @endif
    <table class="content-table">
        <thead>
            <tr>
                <th>نام نویسنده</th>
                <th>متن نظر</th>
                <th>وضغیت</th>

            </tr>
        </thead>
        <tbody class="tbody-mobile">
            @foreach ($articlesComment as $comment)


            <tr class="comment-table-mobile">
                <td class="comment-table-mobile-td">
                    <h4>نام نویسنده</h4>&nbsp;
                    {{ $comment->name }}
                </td>
                <td class="comment-table-mobile-td">
                    <h4>متن نظر</h4>
                    {{ $comment->body }}
                </td>
                <td class="comment-table-mobile-td">
                    <h4>وضغیت</h4>&nbsp;
                    @if ($comment->status == 1)
                        <span><span class="badge badge-success">تایید شده</span></span>
                    @endif
                    @if ($comment->status == 0)
                        <span><span class="badge badge-danger">تایید نشده</span></span>
                    @endif
                </td>

            </tr>




            @endforeach
        </tbody>
    </table>

</div>



@endsection
