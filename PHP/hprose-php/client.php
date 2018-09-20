<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2018/9/12
 * Time: 上午11:45
 */
require_once "vendor/autoload.php";
use Hprose\Client;

$client = Client::create('http://127.0.0.1:8181/', false); //同步
//$client = Client::create('http://127.0.0.1:8181/', true); //异步

$to = "tech@ipasspay.com";
$subject = "来自PHP邮件测试";
$content = "hello world!";
$domain = "helloworld";
$time_stamp = "123456";
$hash_info = "d9e6078facf3a7e5011d09d6077db2c8";
//$hash_info = md5("953804d73e685a62d97066ee9d1b0059".$time_stamp);
$t1 = microtime(true);

//阻塞发送
//var_dump($client->mailhandle($to,$subject,$content,$domain,$time_stamp,$hash_info,1));
//非阻塞发送
var_dump($client->mailHandle($to,$subject,$content,$domain,$time_stamp,$hash_info,0));
//var_dump($client->hello("worldfdasfdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdsafdasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddddasfdsafdsafdsafdsafdsafdsafsdafdddddddddddd"));
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,3).'秒<br>';
