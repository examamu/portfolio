@extends('layouts.app')
@section('content')
<main class = "container ">
    <div class = "">
    <h1>訪問スケジュール管理</h1>
        <form method = "POST" class = "panel panel-default">
            <h2 class = "panel-heading">週間スケジュール</h2>
    {{ csrf_field() }}
            <section class="panel-body">
                    <div class="weekly_toggle">
                        <ul id="weekTabs">
                            <li id="w0" data-num="0" class="ozTab tab_date active_week">今週</li>
                            <li id="w1" data-num="1" class="ozTab tab_date">来週</li>
                            <li id="w2" data-num="2" class="ozTab tab_date">再来週</li>
                        </ul>
                    </div>

<!-- エラー表示 -->

    
<!-- エラー表示 -->


                <div class="date_toggle" data-toggle="buttons">
                    <ul id="ozTabs">
<!--日〜土を表示-->
@foreach( $week as $data )
                        <li id="t{{ $loop->iteration-1 }}" data-num="{{ $loop->iteration-1 }}" class="ozTab @if($loop->iteration === 1)active @endif">{{ $data }}</li>       
@endforeach
                    </ul>
                </div>




                <div class = "tabBody">

@for( $i = 0; $i < 21; $i++)<!--3週間ぶんのテーブル出力-->
                    <div id="c{{ $i }}" class = "col-md-12 tabContent @if($i === 0)active @endif">

                        <div class="thead">
                                <h2 id="p{{ $i }}" class = "tbody weekly_array @if($i === 0)active @endif">{{ $weekly_array[$i] }}</h2>
                        </div>


                        <div class = "tbody">
        <!--時間の表示-->
    @foreach( $times as $time )
                            <input type = "hidden" name = "time{{ $i }}{{ $loop->iteration-1 }}" value = "{{ $time }}">
                            <input type = "hidden" name = "schedule_id{{ $i }}{{ $loop->iteration-1 }}" value ="{{ $get_weekly_schedules[$weekly_array[$i]][$time]['schedule_id'] }}">

                            <a class = "table_time collapsed"  data-toggle="collapse" href="#collapse{{ $i }}{{ $loop->iteration-1 }}" aria-expanded="false" aria-controls="form_button{{ $i }}{{ $loop->iteration-1 }}">
                                {{ $time }}
                            </a>

                            <div id="collapse{{ $i }}{{ $loop->iteration-1 }}" class = "form_wrapper collapse" role="tabpanel">

                        

                                <div class = "card card-body table_select table_customer_name">
                                    <div>利用者</div>
            <!-- 変更できないように -->
            @if( $weekly_array[$i] <= date('Y-m-d') && $time < date('His'))
                                    <select name = "post_schedule_customer_id{{ $i }}{{ $loop->iteration-1 }}" disabled>
            @else
                                    <select name = "post_schedule_customer_id{{ $i }}{{ $loop->iteration-1 }}">
            @endif

            @forelse( $customers as $customer )
                    <!--利用者一覧-->
                    @if($loop->first)              
                                        <option value = "no_customer"></option>
                    @endif
                    <!-- もし取得できていれば-->
                    @if( $get_weekly_schedules[$weekly_array[$i]][$time]['customer_data']['id'] === $customer->customer->id )
                                        <option value="{{ $customer->customer->id }}" selected>{{ $customer->customer->name }}</option>
                    @else
                                        <option value="{{ $customer->customer->id }}">{{ $customer->customer->name }}</option>
                    @endisset
            @empty
                                        <option value = "no_customer">no customer</option>     
            @endforelse
                                    </select>
                                </div>
                                



                                <div class = "table_select table_service_type">
                                    <div>利用種別</div>
            @if( $weekly_array[$i] <= date('Y-m-d') && $time < date('His'))
                                    <select name = "post_schedule_service_type{{ $i }}{{ $loop->iteration-1 }}" disabled>
            @else
                                    <select name = "post_schedule_service_type{{ $i }}{{ $loop->iteration-1 }}">
            @endif

            @forelse( $serviceTypes as $serviceType )
                @if($loop->first)
                                        <option value = "no_service"></option> 
                @endif

                @if( $get_weekly_schedules[$weekly_array[$i]][$time]['service_type_data']['id'] === $serviceType->id)
                                        <option value = "{{ $serviceType->id }}" selected>{{ $serviceType->service_type }}</option>
                @else
                                        <option value = "{{ $serviceType->id }}">{{ $serviceType->service_type }}</option>
                @endif
            @empty
                                        <option value = "no_service">施設の提供サービスが選択されていません</option> 
            @endforelse    
                                    </select>
                                </div>



                                <div class = "table_select table_staff_name">
                                    <div>ヘルパー</div>

            @if( $weekly_array[$i] <= date('Y-m-d') && $time < date('His'))
                                    <select name = "post_schedule_staff_id{{ $i }}{{ $loop->iteration-1 }}" disabled>
            @else
                                    <select name = "post_schedule_staff_id{{ $i }}{{ $loop->iteration-1 }}">
            @endif

            @forelse( $staffs as $staff )
                @if($loop->first)
                                        <option value = "no_staff"></option>
                @endif

                @if( $get_weekly_schedules[$weekly_array[$i]][$time]['user_data']['id'] === $staff->user->id)
                                        <option value = "{{ $staff->user->id }}" selected>{{ $staff->user->name }}</option>
                @else
                                        <option value = "{{ $staff->user->id }}">{{ $staff->user->name }}</option>
                @endif
            @empty
                                        <option value = "no_staff">no user</option>           
            @endforelse
                                    </select>
                                </div>



                            </div>
        @endforeach
                        </div>
                    </div>
    @endfor
                </div>
                <input type = "submit" name = "weekly_schedule" value = "予定を確定させる" class = "btn-primary btn-block" id = "schedule_submit">
            </section>
        </form>



        <h1>施設情報</h1>
        <form method = "POST" class = "panel panel-default">
            <div class = "panel-body">
                <div class = "facility">
                    
                                <h3>施設名</h3>
                                <p>{{ $facility_data->name }}</p>

                                <h3>提供サービス</h3>
                                <p>訪問介護</p>

                                <h3>サービス提供時間</h3>
                                <p>{{ $facility_data->opening_hours }}から{{ $facility_data->closing_hours }}まで</p>

                                <h3>定休日</h3>           
                                <p>日</p>

                    <!--<input type = "submit" name = "weekly_schedule" value = "施設情報を変更する" class = "btn-primary btn-block">-->
                </div>
            </div>
        </form>


        <h1>スタッフ情報</h1>
        <div class = "panel panel-default">
            <div class = "panel-body">
                <table class = "table">
                    <thead>
                        <th>スタッフ名</th>
                        <th>役職</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td>testuser</td>
                        <td>管理者</td>
                        <td>
                            <!-- <form method = "POST">
                                <input type = "submit" name = "staff_edit" value = "情報を変更する">
                            </form> -->
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        
        <h1>利用者管理</h1>
        <div class = "panel panel-default">
            <div class = "panel-body">
            <table class = "table">
                <thead>
                    <tr>
                        <th>利用者名</th>
                        <th>要介護度</th>
                        <th>利用曜日</th>
                        <!-- <th>利用休止</th>
                        <th>利用者情報変更</th> -->
                    </tr>
                </thead>
                <tbody>
    @forelse( $customers as $customer)
                    <tr>
                        <td>{{ $customer->customer->name }}</td>
                        <td>{{ $customer->customer->care_type }}{{ $customer->customer->nursing_care_level }}</td>
                        <td>{{ $customer->date_of_use }}</td>
                        <!-- <td>
                            <form method = "POST">
                                <input type = "submit" name = "customer_suspension_update" value = "利用→休止">
                            </form>
                        </td> -->
                        <!-- <td>
                            <form method = "POST">
                                <input type = "submit" name = "customer_data_update" value = "情報を変更する">
                            </form>
                        </td> -->
                    </tr>
    @empty
    <tr>
        <td>利用者がいません</td>
    </tr>
    @endforelse
                </tbody>
            </table>
            <a href = "{{ url('/customer') }}" class = "btn-primary btn-block">利用者管理ページへ移動</a>
            <p>※1年間利用がない場合は利用者削除されますのでご注意ください</p>
            </div>
        </div>
    </div>
</main>

@endsection