<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/6
 * Time: 11:26
 */
header('Content-Type: text/plain');
function __autoload($class_name)
{
    require_once "$class_name.php";
}

$email_sender = new EmailSender();
$user = new User('user1@domail.com', '张三', '136100002000', '1234656');

$user->attach($email_sender);
echo PHP_EOL;

$user->resetPassword();
echo PHP_EOL;

$mobile_sender = new MobileSender();
$user->attach($mobile_sender);
$user->changePassword('123456');

echo PHP_EOL;

$user->detach($email_sender);
$user->resetPassword();