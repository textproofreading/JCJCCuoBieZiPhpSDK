<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client;

$response = $client->post('http://api.cuobiezi.net/spellcheck/json_check/json_phrase', [
    'json' => [
        'content' => '腾讯今年中国人民共和国下半年上世纪将在微信账户钱包帐户的“九宫格”中开设快速的笑着保险入口。',
        'mode' => 'advanced',
        'username' => 'tester',
        'biz_type' => 'show',
    ]
]);

$result = json_decode($response->getBody()->getContents());

print_r($result);
