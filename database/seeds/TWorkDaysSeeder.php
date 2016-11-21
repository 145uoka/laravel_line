<?php
use Illuminate\Database\Seeder;
use App\Models\TWorkDays;
class TWorkDaysSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_出勤のSeeder
        
        // DELETE文
        DB::table ( 't_work_days' )->delete ();
        
        // INSERT文
        TWorkDays::create ( array (
                        'shop_id' => 1,
                        'staff_id' => 1,
                        'work_day' => '20161120',
                        'start_plan_time' => '1100',
                        'end_plan_time' => '1900',
                        'last_plan_time' => '1800',
                        'start_plan_time_minute' => 660,
                        'end_pran_time_minute' => 1140,
                        'last_pran_time_minute' => 1080 
        ) );
        
        TWorkDays::create ( array (
                        'shop_id' => 1,
                        'staff_id' => 2,
                        'work_day' => '20161120',
                        'start_plan_time' => '1700',
                        'end_plan_time' => '2400',
                        'last_plan_time' => '2200',
                        'start_plan_time_minute' => 960,
                        'end_pran_time_minute' => 1440,
                        'last_pran_time_minute' => 1320 
        ) );
    }
}
