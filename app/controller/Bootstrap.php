<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 4/27/17
 * Time: 11:38 PM
 */

namespace app\controller;
use core\Controller;
use core\View;
use Core\Config;
use library\Models\CorePagesModel;
use library\Models\SiteKeyWordsModel;

class Bootstrap extends Controller
{

    public $display_page_content,
        $get_page_content,
        $core_page_number = 1140,
        $keyword_type = Config::CORE_PAGES_KEYWORDS,
        $getSiteKeywords,
        $siteName,
        $siteContent,
        $username,
        $userLogin;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
    }

    /**
     * Before filter which is useful for login authentication
     * session control and cookies
     *
     * @return void
     */
    protected function before()
    {
        $this->siteName = parent::getSiteName();

        /*$this->getSiteKeywords = new SiteKeyWordsModel();
        $this->getSiteKeywords->find($this->keyword_type);
        $this->siteKeywords = $this->getSiteKeywords->data()->pages_Keywords;*/

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        $this->siteContent = $this->getPageContent->data()->corePages_Content;

        /* $loggedInUserName = new Userprofile();
       $this->username = $loggedInUserName->getLoggedInUserInfo();*/

    }

    /**
     * After filter which could potentially be good for destroying sessions etc
     *
     * @return void
     */
    protected function after(){}

    public function indexAction()
    {
        View::renderTemplate('features/index.phtml', [
            'tabTitle' => 'BootStrap',
            'pageTitle' => 'BootStrap',
            'siteName' => $this->siteName,
            //'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Get Marvelle and BootStrap',
            //'username' =>  $this->username,
            //'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent,
        ]);

    }


}