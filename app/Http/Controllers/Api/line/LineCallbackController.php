<?php

namespace App\Http\Controllers\Api\line;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use App\Logic\AccessTokenManager;

use Illuminate\Http\Request;

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
     * LineBotからのCallBack処理
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    $headers = apache_request_headers();
        
        // inputの取得
        $input = file_get_contents ( 'php://input' );
        $json = json_decode ( $input );
        
        $event = $json->events [0];
        
        // line-bot
        $httpClient = new CurlHTTPClient ( config ( 'lineSdk.CHANNEL_ACCESS_TOKEN' ) );
        $bot = new LINEBot ( $httpClient, [ 
                        'channelSecret' => config ( 'lineSdk.CHANNEL_SECRET' ) 
        ] );
        
        $shopId = 1; // dummy
        $accessTokenManager = new AccessTokenManager();
        
        if ('user' == $event->source->type) {
            
            if ("postback" == $event->type) {
                // event->type:postbak
                if ("1" == $event->postback->data) {
                    $textMessageBuilder = new TextMessageBuilder ( "参加で受付ました。" );
                    $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                } else if ("2" == $event->postback->data) {
                    $textMessageBuilder = new TextMessageBuilder ( "不参加で受付ました。" );
                    $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                }
                return;
            } else if ("message" == $event->type) { // 一般的なメッセージ(文字・イメージ・音声・位置情報・スタンプ含む)
                                                    
                // テキストメッセージにはオウムで返す
                if ("text" == $event->message->type) {
                    $inputText = $event->message->text;
                    file_put_contents ( "php://stdout", "\n" . $inputText );
                    if ('参加可否入力' == $inputText) {
                        
                        $response = $bot->replyMessage ( $event->replyToken, new TemplateMessageBuilder ( '参加しますか？', new ConfirmTemplateBuilder ( '参加しますか？', [ 
                                        new PostbackTemplateActionBuilder ( "はい", "1" ),
                                        new PostbackTemplateActionBuilder ( 'いいえ', '2' ) 
                        ] ) ) );
                        
                        if ($response->isSucceeded ()) {
                            // success
                        } else {
                            // fail
                        }
                        return;
                    } else if ('ユーザID取得' == $inputText) {
                        $replyMsg = $event->source->userId;
                        $textMessageBuilder = new TextMessageBuilder ( $replyMsg );
                        $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                        return;
                    } else if ('プロフィール取得' == $inputText) {
                        $res = $bot->getProfile ( $event->source->userId );
                        if ($res->isSucceeded ()) {
                            $profile = $res->getJSONDecodedBody ();
                            $profileDispName = '[表示名]=' . $profile ['displayName'];
                            $profilePictUrl = '[画像]=' . $profile ['pictureUrl'];
                            $profileStatus = '[ステータス]=' . $profile ['statusMessage'];
                            $textMessageBuilder = new TextMessageBuilder ( "あなたのプロフィール情報です。", $profileDispName, $profilePictUrl, $profileStatus );
                            $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                            return;
                        } else {
                            $textMessageBuilder = new TextMessageBuilder ( 'unknown' );
                            $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                            return;
                        }
                    } else if ('予約' == $inputText) {
                        
                        $userId = 1;
                        $accessToken = $accessTokenManager->createToken(32, 5, $shopId, $userId);
                        
                        $tempA = new TemplateMessageBuilder ( 'alt', new ButtonTemplateBuilder ( '予約機能', '以下から行いたい操作を選択してください。', null, [ 
                                        new UriTemplateActionBuilder ( '予約受付', 'https://laravel-line.herokuapp.com/reserve/'.$accessToken ),
                                        new PostbackTemplateActionBuilder ( "予約確認", "1" )
                        ] ) );
                        
                        $response = $bot->replyMessage ( $event->replyToken, $tempA );
                    }
                }
                
                $tempA = new TemplateMessageBuilder ( 'alt',
                                new ButtonTemplateBuilder ( 'title', 'text', null,  [
                                new PostbackTemplateActionBuilder ( "はい", "1" ),
                                new UriTemplateActionBuilder ( '予約', 'https://laravel-line.herokuapp.com/reserve' )
                ] ) ) ;
                
//                 $response = $bot->replyMessage ( $event->replyToken, $tempA);
                
                
                $headerValue;
                foreach ( $headers as $header => $value ) {
                    $headerValue = $headerValue.$header."\\n";
                }
                
                $textMessageBuilder = new TextMessageBuilder ( $headerValues );
                $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                return;
            }
        } else {
        }
        return;
    }
    
    
}
