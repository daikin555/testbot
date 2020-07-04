<?php
    // Composerでインストールしたライブラリを一括読み込み
    require_once __DIR__ . '/vendor/autoload.php';

    // アクセストークンを使いCurlHTTPClientをインスタンス化
    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('ReUDNfD3TDQsClwlr3slXvTfeHA+kv/HV5RJ0WmRoI8zodhnudaUaE9URzQS/RVB7J+JrHhShiswpMcqgJPBVhi+5gMLIvpDLonRslaEg63dGDvS0SBVh0fqD217FJ0hdSG8cBqGIMlGvX8yliqsfwdB04t89/1O/w1cDnyilFU=');

    //CurlHTTPClientとシークレットを使いLINEBotをインスタンス化
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'ec13060a38c60466f8cc9eea5405552f']);

    // LINE Messaging APIがリクエストに付与した署名を取得
    $signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

    //署名をチェックし、正当であればリクエストをパースし配列へ、不正であれば例外処理
    $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

    foreach ($events as $event) {
        // メッセージを返信
        $response = $bot->replyMessage(
            $event->getReplyToken(), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($event->getText())
        );
    }
