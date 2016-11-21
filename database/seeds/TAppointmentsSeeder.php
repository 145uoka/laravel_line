<?php
use Illuminate\Database\Seeder;
use App\Models\TAppointments;
class TAppointmentsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_指名のSeeder
        
        // DELETE文
        DB::table ( 't_appointments' )->delete ();
        
        // INSERT文
        TAppointments::create ( array (
                        'shop_id' => 1,
                        'order_no' => 1,
                        'display_name' => 'スタイリスト',
                        'price' => 500 
        ) );
        
        TAppointments::create ( array (
                        'shop_id' => 1,
                        'order_no' => 2,
                        'display_name' => 'アーティスト',
                        'price' => 1000 
        ) );
    }
}
