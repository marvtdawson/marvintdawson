<?php
namespace App\Controller;
use core\Config;
use core\Controller;
use core\View;
use library\Sessions\Sessions;
use appcms\controller\Userprofile;

class Home extends Controller  {

    public $regSuccess,
        $username,
        $userLogin,
        $siteName;

    /**
     * Before filter which is useful for login authentication
     *
     * @return void
     */
    protected function before()
    {
        $this->siteName = parent::getSiteName();

        /*$loggedInUserName = new Userprofile();
        $this->username = $loggedInUserName->userName;
        $this->userLogin = $loggedInUserName->checkLoggedInUser();*/
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }


    public function indexAction()
    {

        if(Sessions::exists('success')){
            $this->regSuccess = Sessions::flash('success');
        }

        View::renderTemplate('index.phtml', [
            'tabTitle' => Config::SITE_NAME,
            'formName' => Config::REGISTER_FORM_NAME,
            'processform' => Config::REGISTER_FORM_PROCESS,
            'submitbutton' =>  Config::REGISTER_FORM_SUBMIT_BUTTON,
            'userReg' => $this->regSuccess,
            'siteName' => $this->siteName,
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
        ]);
    }


}