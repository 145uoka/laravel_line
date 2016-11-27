<?php
use App\Models\TUsers;
use Illuminate\Database\Seeder;
class TUsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // T_ユーザのSeeder
        
        // DELETE文
        DB::table ( 't_users' )->delete ();
        
        // INSERT文
        TUsers::create ( array (
                        'user_id' => 1,
                        'hash_user_id' => '1',
                        'line_mid' => 'Ub0b37e268b2143fb40b997ca6a5b0820',
                        'role' => '0' 
        ) );
    }
}
