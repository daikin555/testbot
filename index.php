<?php
DEFINE("ACCESS_TOKEN","ReUDNfD3TDQsClwlr3slXvTfeHA+kv/HV5RJ0WmRoI8zodhnudaUaE9URzQS/RVB7J+JrHhShiswpMcqgJPBVhi+5gMLIvpDLonRslaEg63dGDvS0SBVh0fqD217FJ0hdSG8cBqGIMlGvX8yliqsfwdB04t89/1O/w1cDnyilFU=");
DEFINE("SECRET_TOKEN","ec13060a38c60466f8cc9eea5405552f");

use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use \LINE\LINEBot\Constant\HTTPHeader;

//LINESDKの読み込み
require_once(__DIR__."/vendor/autoload.php");

//LINEから送られてきたらtrueになる
if(isset($_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE])){

//LINEBOTにPOSTで送られてきた生データの取得
  $inputData = file_get_contents("php://input");

//LINEBOTSDKの設定
  $httpClient = new CurlHTTPClient(ACCESS_TOKEN);
  $Bot = new LINEBot($HttpClient, ['channelSecret' => SECRET_TOKEN]);
  $signature = $_SERVER["HTTP_".HTTPHeader::LINE_SIGNATURE];
  $Events = $Bot->parseEventRequest($InputData, $Signature);

//大量にメッセージが送られると複数分のデータが同時に送られてくるため、foreachをしている。
foreach($Events as $event) {
    $SendMessage = new MultiMessageBuilder();
    $TextMessageBuilder = new TextMessageBuilder("よろぽん！");
    $SendMessage->add($TextMessageBuilder);
    $Bot->replyMessage($event->getReplyToken(), $SendMessage);
  }
}
