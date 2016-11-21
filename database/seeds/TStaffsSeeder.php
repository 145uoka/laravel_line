<?php
use Illuminate\Database\Seeder;
use App\Models\TStaffs;
class TStaffsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_スタッフのSeeder
        
        // DELETE文
        DB::table ( 't_staffs' )->delete ();
        
        // INSERT文
        TStaffs::create ( array (
                        'staff_id' => 1,
                        'shop_id' => 1,
                        'name' => '山田',
                        'age' => 20 
        ) );
        
        TStaffs::create ( array (
                        'staff_id' => 2,
                        'shop_id' => 1,
                        'name' => '田中',
                        'age' => 23 
        ) );
    }
}
