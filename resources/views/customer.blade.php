@extends('layouts.app')
@section('content')
<main class="container">
    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
            <div class = "alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach
@elseif($_SERVER['REQUEST_METHOD'] === 'POST')

            <div class = "alert alert-success">
                {{ $msg }}
            </div>
@endif
            <h1>利用者登録追加</h1>
            <div class = "panel panel-default">
                <div class = "panel-body">
                    <form method = "POST">
                        {{ csrf_field() }}
                        <label>
                        <p>利用者名</p>
                        <p><input type = "text" name = "customer_name" placeholder="利用者名を入力してください"></p>
                        </label>
                        <div class = "cp_ipcheck">
                            <p>利用状況 </p>
                            <ul>
        @foreach($week as $date)
                                <li class = "list_item">
                                    <label>
                                        <input type = "checkbox" name = "post_week[]" value = "{{ $loop->iteration-1 }}" class="option-input07">
                                        {{ $date }}
                                    </label>
                                </li>
        @endforeach
                            </ul>                
                        </div>
                        <div class = "cp_ipcheck">
                            <ul>
                                <li class = "list_item">
                                    <label>
                                        <input type = "radio" name = "nursing_care_level" value = "0" class="option-input07">
                                        要支援
                                    </label>
                                </li>
                                <li class = "list_item">
                                    <label>
                                        <input type = "radio" name= "nursing_care_level" value = "1" class="option-input07">
                                        要介護
                                    </label>
                                </li>

        @for($i = 1; $i<=5; $i++)
                                <li class = "list_item">
                                    <label>
                                        <input type = "radio" name = care_level_num value ="{{ $i }}" class="option-input07">
                                        {{ $i }}
                                    </label>
                                </li>
        @endfor
                            </ul>
                        </div>

                        <input type = "submit" name = "insert_customer" value = "利用者登録">
                    </form>
                </div>
            </div>

            <h1>利用者情報修正</h1>
            <div class = "panel panel-default">
                <div class = "panel-body">
                    <form method = "POST">
                    {{ csrf_field() }}
                        <input type = "submit" name = "update_customer" value = "利用者情報修正">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
