<?php

namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;

class SendMsgController extends Controller
{
    //
    public function index() {
        // line-bot
        $httpClient = new CurlHTTPClient ( config ( 'lineSdk.CHANNEL_ACCESS_TOKEN' ) );
        $bot = new LINEBot ( $httpClient, [ 
                        'channelSecret' => config ( 'lineSdk.CHANNEL_SECRET' ) 
        ] );
        
        $textMessageBuilder = new TextMessageBuilder('hello');
        $response = $bot->pushMessage('Ub0b37e268b2143fb40b997ca6a5b0820', $textMessageBuilder);
        echo "hoge";
    }
}
