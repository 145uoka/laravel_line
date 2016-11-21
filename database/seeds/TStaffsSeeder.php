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
                        'name' => 'アヤ',
                        'age' => '20代後半' 
        ) );
        
        TStaffs::create ( array (
                        'staff_id' => 2,
                        'shop_id' => 1,
                        'name' => 'ミナコ',
                        'age' => '30代前半' 
        ) );
        
        TStaffs::create ( array (
                        'staff_id' => 3,
                        'shop_id' => 1,
                        'name' => 'ユキ',
                        'age' => '22代前半' 
        ) );
    }
}
