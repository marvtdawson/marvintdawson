<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 7/6/17
 * Time: 1:47 AM
 */

namespace Library\Controller;


class UserBrowser
{
    public $user_browser;

    public function constructor(){

        $this->user_browser = $_SERVER['HTTP_USER_AGENT'];
    }

}