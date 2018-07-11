# JCJCCuoBieZiPhpSDK
> JCJC chinese spellchecker  CuoBieZi Php SDK

## 安装

> Composer repo 待定

```
git clone https://github.com/textproofreading/JCJCCuoBieZiPhpSDK.git

composer install
```

## 用法


```php
require 'vendor/autoload.php';

$content = '腾讯今年中国人民共和国下半年上世纪将在微信账户钱包帐户的“九宫格”中开设快速的笑着保险入口。';

$config = [
    'mode' => 'advanced',
    'username' => 'tester',
    'biz_type' => 'show',
];

$checker = new JcJcCuoBieZi\Checker($config);

// 使用全局设置
$result = $checker->check($content);

print_r($result);

// 使用局部设置, 局部设置会覆盖全局设置
$result = $checker->check($content, [
    'username' => 'vip',
    'biz_type' => 'show',
    'is_return_sentence' => true,
]);

print_r($result);

```