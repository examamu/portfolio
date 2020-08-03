@extends('layouts.app')
@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <p class="panel-heading">ダッシュボード</p>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>

            <article class = "panel panel-default">
                <p class="panel-heading">本日次の予定</p>
                <section class="panel-body">
@isset($next_schedule->start_time)
                    <p>{{ $next_schedule->start_time }}</p>
                    <h1>次は{{ $next_schedule->customer->name }}さん宅です。</h1>
                    <p>{{ $next_schedule->description }}</p>
@else
                    <p>お疲れ様でした！本日の予定は全て終了しています。</p>
@endisset
                </section>
            </article>

            <article class = "panel panel-default">
                <p class = "panel-heading">本日その後の予定</p>
                <table class = "table">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>名前</th>
                            <th>伝達事項</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
@forelse($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->start_time }}</td>
                            <td>{{ $schedule->customer->name }}さん</td>
                            <td>{{ $schedule->description }}</td>
                            <td>
                                <form method = "POST">
                                    <input type = "submit" name = "" value = "詳細を確認">
                                </form>
                            </td>
@empty
                            <td>本日の予定はありません</td>
                        </tr>
@endforelse
                    </tbody>
                </table>
            </article>

            <article class = "panel panel-default">
                <p class = "panel-heading">終了した予定</p>
                <table class = "table">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>名前</th>
                            <th>伝達事項</th>
                        </tr>
                    </thead>
                    <tbody>
@forelse( $today_finish_schedules as $schedule)
                        <tr>
                            <td id = "today_history_start_time">{{ $schedule->start_time }}</td>
                            <td id = "today_history_customer_name">{{ $schedule->customer->name }}さん</td>
                            <td>
                                <button type="button" name = "description{{ $loop->iteration }}" id = "description{{ $loop->iteration }}" class = "btn">伝達事項を記入する</button>
                            </td>
                        </tr>                   
@empty
                        <tr>
                            <td>本日終了した予定はありません</td>
                        </tr>
@endforelse
                    </tbody>
                </table>
                <section id = "modal_window" class = "modal_window">
                    <form method = "POST" class = "modal-content">
                    {{ csrf_field() }}
                        <textarea name = "post_description" placeholder = "伝達事項を記入してください"></textarea>
                        <input type = "hidden" name = "post_description_id" value = "" id= "post_description">
                        <input class="btn btn-primary" type="submit" value = "送信する">
                    </form>
                </section>  
            </article>

        </div>
    
        <!-- <nav class = "col-md-8 col-md-offset-2">
            <form>
                <div class = "form-group">
                    <input type = "submit" name = "" value = "自分の予定を確認する" class = "btn-block">
                </div>
            </form>
            <form>
                <div class = "form-group">
                    <input type = "submit" name = "" value = "他の職員の予定を確認する" class = "btn-block">
                </div>
            </form>
        </nav> -->
    </div>
</main>

@endsection

<script>
    var num = '<?php echo count($today_finish_schedules); ?>';
</script>