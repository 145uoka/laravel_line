<?php
use Illuminate\Database\Seeder;
use App\Models\TCourses;
class TCoursesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_コースのSeeder
        
        // DELETE文
        DB::table ( 't_courses' )->delete ();
        
        // INSERT文
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => 1,
                        'course_name' => 'カット',
                        'minute' => 45,
                        'price' => 3000,
                        'isExtension' => false 
        ) );
        
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => 2,
                        'course_name' => 'パーマ',
                        'minute' => 120,
                        'price' => 4000,
                        'isExtension' => false 
        ) );
        
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => 3,
                        'course_name' => 'カラー',
                        'minute' => 90,
                        'price' => 4500,
                        'isExtension' => false 
        ) );
        
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => 1,
                        'course_name' => '20分',
                        'minute' => 20,
                        'price' => 3000,
                        'isExtension' => true 
        ) );
        
        TCourses::create ( array (
                        'shop_id' => 1,
                        'order_no' => 2,
                        'course_name' => '40分',
                        'minute' => 40,
                        'price' => 5000,
                        'isExtension' => true 
        ) );
    }
}
