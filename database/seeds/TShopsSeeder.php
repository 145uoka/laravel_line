<?php

use Illuminate\Database\Seeder;
use App\Models\TShops;

class TShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('t_shops')->delete();
        
        TShops::create ( array (
                        'shop_name' => 'JEWEL',
                        'telephone' => 'xxx-xxxx-xxxx',
                        'address' => 'yyyy-zzz-zzz' 
        ) );
    }
}
