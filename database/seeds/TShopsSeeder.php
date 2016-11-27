<?php
use Illuminate\Database\Seeder;
use App\Models\TShops;
class TShopsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_店舗のSeeder
        
        // DELETE文
        DB::table ( 't_shops' )->delete ();
        
        // INSERT文
        TShops::create ( array (
                        'shop_id' => 1,
                        'hash_shop_id' => 'ddd',
                        'shop_name' => 'JEWEL',
                        'telephone' => 'xxxx-xxx-xxxx',
                        'address' => 'yyyyzzzzxxxx' 
        ) );
    }
}
