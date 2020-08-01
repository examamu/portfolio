@extends('layouts.app')
@section('content')

<main class="container">

<h1>ユーザー登録情報変更</h1>


@if(count($errors) > 0)
    <div>
        <ul class = "list-group">
    @foreach ($errors->all() as $error)
            <li class = "alert alert-danger" role="alert">{{ $error }}</li>
    @endforeach
        </ul>
    </div>
@elseif($_SERVER['REQUEST_METHOD'] === 'POST')
    <div class = "alert alert-success">
        {{ $msg }}
    </div>
@endif
    <div class = "panel panel-default">
        <div class="row panel-body">
            <div class="col-md-8 col-md-offset-2">
                <form method = "POST">
                    {{ csrf_field() }}
                    <input type = "hidden" name = "user_id" value = "{{ $user_id }}">
                    <table>
                        <tr>
                            <td>
                                <label>
                                    <p>ユーザー名</p>
                                    <p><input type = "text" name = "update_name" value = "{{ $user_name }}"></p>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <p>登録Emailアドレス</p>
                                    <p><input type = "text" name = "update_email" value = "{{ $email }}"></p>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <p>施設名：{{ $facility_name }} </p>
                                    <input type = "text" name = "update_facility" placeholder = "施設IDを入力してください"></p>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type = "submit" name = "update_user_data" value = "変更内容を保存する" class ="btn-primary btn-block">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>



</main>

@endsection
