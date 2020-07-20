<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $schedule_model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->schedule_model = new Schedule;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
     */
    // public function create(Request $request)
    // {   
    //     $data = $this->schedule_model->get_schedule_data();
        

    //     for($i = 0; $i < 7; $i++){
    //         for($j = 0; $j < 7; $j++){

    //             if($request->input('post_schedule_customer_name'.$i.$j) === 'no_customer' ){
    //                 continue;
    //             }

    //             if($request->input('post_schedule_service_type'.$i.$j) === 'no_service' ){
    //                 continue;
    //             }

    //             if($request->input('post_schedule_staff_name'.$i.$j) === 'no_staff' ){
    //                 continue;
    //             }
                
    //             $weekly_array = $this->schedule_model->calendar();

    //             //利用時間
    //             $time = trim($request->input('time'.$i.$j)).':00';

    //             //利用者名が送られてくるので利用者IDへ置換
    //             $customer_name = $request->input('post_schedule_customer_name'.$i.$j);
    //             $customer_data = \App\Customer::where('name', $customer_name)->first();

    //             //利用種別
    //             $service_type_id = $request->input('post_schedule_service_type'.$i.$j);

    //             //スタッフ名が送られてくるのでスタッフ情報を取得
    //             $staff_name = $request->input('post_schedule_staff_name'.$i.$j);
    //             $staff_data = \App\User::with('staff')->where('name', $staff_name)->first();

    //             //施設情報取得
    //             $facility_data = \App\Facility::find($staff_data->staff->facility_id)->first();


    //             $this->schedule_model->customer_id = $customer_data['id'];
    //             $this->schedule_model->user_id = $staff_data['id'];
    //             $this->schedule_model->facility_id = $facility_data['id'];
    //             $this->schedule_model->service_type_id = $service_type_id;
    //             $this->schedule_model->date = $weekly_array[$i];
    //             $this->schedule_model->start_time = $time;

    //             $this->schedule_model->save();
    //         }
    //     }

    //     return view('admin',[
    //         'customers' => $data['customers'],
    //         'active_customers' => $data['active_customers'],
    //         'staffs' => $data['staffs'],
    //         'serviceTypes' => $data['serviceTypes'],
    //         'week' => config('const.WEEK'),
    //         'weekly_array' => $data['weekly_array'],
    //         'times' => $data['times'],
    //         'facility_data' => $data['facility_data'],
    //         'count_date' => count($data['times']),
    //     ]);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
