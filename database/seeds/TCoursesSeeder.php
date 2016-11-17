<?php

use Illuminate\Database\Seeder;
use App\Models\TCourses;

class TCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('t_courses')->delete();
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => '1',
                        'course_name' => 'カット',
                        'minute' => '60',
                        'prise' => '6000' 
        ) );
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => '2',
                        'course_name' => 'パーマ',
                        'minute' => '90',
                        'prise' => '9000'
        ) );
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => '2',
                        'course_name' => 'カラー',
                        'minute' => '90',
                        'prise' => '4500'
        ) );
    }
}
