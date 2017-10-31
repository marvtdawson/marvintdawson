<?php
namespace App\Controller;

use core\Controller;
use core\View;
use core\Config;
use library\Models\CorePagesModel;
use library\Models\SiteKeyWordsModel;
use appcms\controller\Userprofile;

class About extends Controller
{
    public $get_page_content,
        $core_page_number,
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

        $this->getSiteKeywords = new SiteKeyWordsModel();
        $this->getSiteKeywords->find($this->keyword_type);
        $this->siteKeywords = $this->getSiteKeywords->data()->pages_Keywords;

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
        $this->core_page_number = '1115';

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        $this->siteContent = $this->getPageContent->data()->corePages_Content;

        View::renderTemplate('about/index.phtml', [
            'tabTitle' => 'About',
            'pageTitle' => strtoupper('About'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'About Us',
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent,
        ]);
    }

    public function educationAction()
    {
        $this->core_page_number = '1127';

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        $this->siteContent = $this->getPageContent->data()->corePages_Content;

        View::renderTemplate('about/education.phtml', [
            'tabTitle' => 'Education',
            'pageTitle' => strtoupper('Education'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'About Us',
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent,
        ]);

    }

    public function portfolioAction()
    {
        //$this->core_page_number = '1115';

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        //$this->siteContent = $this->getPageContent->data()->corePages_Content;

        View::renderTemplate('about/work.phtml', [
            'tabTitle' => 'Portfolio',
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'About Us',
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            //'pageContent' => $this->siteContent,
        ]);

    }

    public function customTestsAction(){

      View::renderTemplate('about/customtests.phtml', [
        'tabTitle' => 'TDD',
        'siteName' => $this->siteName,
        'siteKeywords' => $this->siteKeywords,
        'pageDescription' => 'Custom Tests written by Marvin Dawson ',
      ]);
    }

    public function customModulesAction(){

      View::renderTemplate('about/custommodules.phtml', [
        'tabTitle' => 'Modules',
        'siteName' => $this->siteName,
        'siteKeywords' => $this->siteKeywords,
        'pageDescription' => 'Custom Modules written by Marvin Dawson ',
      ]);

    }
}