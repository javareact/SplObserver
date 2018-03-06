<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/6
 * Time: 11:02
 */

class User implements SplSubject
{
    private $email;
    private $username;
    private $mobile;
    private $password;


    private $observers=null;

    /**
     * User constructor.
     * @param $email
     * @param $username
     * @param $mobile
     * @param $password
     */
    public function __construct($email, $username, $mobile, $password)
    {
        $this->email = $email;
        $this->username = $username;
        $this->mobile = $mobile;
        $this->password = $password;

        $this->observers=new SplObjectStorage();
    }


    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        $userInfo=array(
            'username'=>$this->username,
            'password'=>$this->password,
            'email'=>$this->email,
            'mobile'=>$this->mobile
        );
        foreach ($this->observers as $observer){
            $observer->update($this,$userInfo);
        }
    }
    public function create(){
        echo __METHOD__,PHP_EOL;
        $this->notify();
    }
    public function changePassword($newPassword){
        echo __METHOD__,PHP_EOL;
        $this->password=$newPassword;
        $this->notify();
    }
    public function resetPassword(){
        echo __METHOD__,PHP_EOL;
        $this->password=mt_rand(10000,99999);
        $this->notify();
    }
}