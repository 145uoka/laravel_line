<?php
use Illuminate\Database\Seeder;
use App\Models\MLineChannels;
class MLineChannelsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // M_LINE_チャンネルのSeeder
        
        // DELETE文
        DB::table ( 'm_line_channels' )->delete ();
        
        // INSERT文
        MLineChannels::create ( array (
                        'channel_id' => '1485291541',
                        'channel_secret' => '4e9b96b9f820edf3ec054e30ffb3ab20',
                        'channel_access_token' => '12cstSE+n0TNWf/eKgvFKmAs0kiU7vdMCI0baULGVvx9pW1VOxXiaSD7M1cO7dbhtOC/H0CoGdZihqPnUlnh5m/qs74xob2tSx/WiEjKq+GinQ/TlWqBEMB4j/SVQDu5oWn3muuM/O+5woyBSVYZKwdB04t89/1O/w1cDnyilFU=',
                        'shop_id' => 1 
        ) );
    }
}
