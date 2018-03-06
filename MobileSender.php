<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/6
 * Time: 11:30
 */

class MobileSender implements SplObserver
{

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        if(func_num_args()===2){
            $userInfo=func_get_arg(1);
            echo "向 {$userInfo['email']} 发送短信成功。内容是：你好 {$userInfo['username']}" .
                "你的新密码是 {$userInfo['password']}，请妥善保管", PHP_EOL;
        }
    }
}