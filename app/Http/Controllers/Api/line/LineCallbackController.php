<?php

namespace App\Http\Controllers\Api\line;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
// use Illuminate\Http\Request;
use Request;

class LineCallbackController extends Controller {
    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        // http-bodyの取得
        $input = file_get_contents ( 'php://input' );
        $json = json_decode ( $input );
        $event = $json->events [0];
        
        $httpClient = new CurlHTTPClient (config('lineSdk.CHANNEL_ACCESS_TOKEN'));
        $bot = new LINE\LINEBot ( $httpClient, ['channelSecret' => config('lineSdk.CHANNEL_SECRET')]);
        
        if ('user' == $event->source->type) {
            if ("postback" == $event->type) {
                if ("1" == $event->postback->data) {
                    file_put_contents ( "php://stdout", "\n参加で受付ました。" );
//                     $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder ( "参加で受付ました。" );
//                     $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                } else if ("2" == $event->postback->data) {
                    file_put_contents ( "php://stdout", "\n不参加で受付ました。" );
//                     $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder ( "不参加で受付ました。" );
//                     $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                }
                return;
            } else if ("message" == $event->type) { // 一般的なメッセージ(文字・イメージ・音声・位置情報・スタンプ含む)
        
                // テキストメッセージにはオウムで返す
                if ("text" == $event->message->type) {
                    $inputText = $event->message->text;
                    file_put_contents ( "php://stdout", "\n".$inputText );
                    if ('参加可否入力' == $inputText) {
        
                        $response = $bot->replyMessage ( $event->replyToken, new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder ( '参加しますか？', new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder ( '参加しますか？', [
                                        new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder ( "はい", "1" ),
                                        new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder ( 'いいえ', '2' )
                        ] ) ) );
        
//                         if ($response->isSucceeded ()) {
//                             file_put_contents ( "php://stdout", "\nisSucceeded\n" );
//                         } else {
//                             file_put_contents ( "php://stdout", "\nisFail\n" );
//                         }
                        return;
                    } else if ('ユーザID取得' == $inputText) {
                        $replyMsg = $event->source->userId;
                        $textMessageBuilder = new LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMsg);
                        $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                        return;
                    } else if ('プロフィール取得' == $inputText) {
//                         $res = $bot->getProfile ( $event->source->userId );
//                         if ($res->isSucceeded ()) {
//                             $profile = $res->getJSONDecodedBody();
//                             $profileDispName = '[表示名]=' . $profile['displayName'];
//                             $profilePictUrl = '[画像]=' . $profile['pictureUrl'];
//                             $profileStatus = '[ステータス]=' . $profile['statusMessage'];
//                             $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("あなたのプロフィール情報です。", $profileDispName, $profilePictUrl, $profileStatus);
//                             $response = $bot->replyMessage( $event->replyToken, $textMessageBuilder );
//                             return;
//                         } else {
//                             $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder ( 'unknown' );
//                             $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
//                             return;
//                         }
                    }
                }
//                 $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder ( $input );
                //         $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder ("aa\naa");
//                 $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                return;
            }
        } else {
        }
        file_put_contents ( "php://stdout", "\nACCESS\n" . config ( 'lineSdk.CHANNEL_ACCESS_TOKEN' ) );
        return;
    }
}
