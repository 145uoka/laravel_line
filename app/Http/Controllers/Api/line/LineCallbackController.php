<?php

namespace App\Http\Controllers\Api\line;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Models\MLineChannels;
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
        
        // inputの取得
        $headerSignature = Request::header('X-LINE-SIGNATURE');
        $input = file_get_contents ( 'php://input' );
        
        $lineChannelInfo = $this->getLineChannelInfo($headerSignature, $input);
        if ($lineChannelInfo == null) {
            return;
        }
        
        $json = json_decode ( $input );
        
        $event = $json->events [0];
        
        // line-bot
//         $httpClient = new CurlHTTPClient ( config ( 'lineSdk.CHANNEL_ACCESS_TOKEN' ) );
//         $bot = new LINEBot ( $httpClient, [ 
//                         'channelSecret' => config ( 'lineSdk.CHANNEL_SECRET' ) 
//         ] );
        
        $httpClient = new CurlHTTPClient ($lineChannelInfo->channel_access_token);
        $bot = new LINEBot ( $httpClient, [
                        'channelSecret' => $lineChannelInfo->channel_secret
        ] );
        
        $shopId = $lineChannelInfo->shop_id;
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
                        return;
                    }
                }
                
                $tempA = new TemplateMessageBuilder ( 'alt',
                                new ButtonTemplateBuilder ( 'title', 'text', null,  [
                                new PostbackTemplateActionBuilder ( "はい", "1" ),
                                new UriTemplateActionBuilder ( '予約', 'https://laravel-line.herokuapp.com/reserve' )
                ] ) ) ;
                
//                 $response = $bot->replyMessage ( $event->replyToken, $tempA);
                
                $headerSignature = Request::header('X-LINE-SIGNATURE');
                $hash = hash_hmac('sha256', $input, config ( 'lineSdk.CHANNEL_SECRET' )  , true);
                $sig = base64_encode($hash);
                $textMessageBuilder = new TextMessageBuilder ($headerSignature.'\n'.$sig);
                $response = $bot->replyMessage ( $event->replyToken, $textMessageBuilder );
                
//                 $compSig = $_SERVER['X-Line-Signature'];
//                 fputs(STDOUT, "aaaaa");
                return;
            }
        } else {
        }
        return;
    }
    
    private function getLineChannelInfo($headerSignature, $input) {
        
        $lineChannels = MLineChannels::all();
        foreach ($lineChannels as $lineChannel) {
            $signature = base64_encode(hash_hmac('sha256', $input, $lineChannel->channel_secret, true));
            if ($signature == $headerSignature) {
                return $lineChannel;
            }
        }
        
        return null;
    }
}
