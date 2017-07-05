<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 12/13/16
 * Time: 1:28 AM
 */

namespace App\Controller;
use core\Config;
use core\Controller;
use core\View;
//use library\Sessions\Sessions;
use appcms\controller\Userprofile;
use library\Models\CorePagesModel;
use library\Models\SiteKeyWordsModel;

class Blog extends Controller
{
    public $display_page_content,
        $get_page_content,
        $core_page_number = 1126,
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
     *
     * @return void
     */
    protected function before()
    {
        $this->siteName = parent::getSiteName();

        $this->getSiteKeywords = new SiteKeyWordsModel();
        $this->getSiteKeywords->find($this->keyword_type);
        $this->siteKeywords = $this->getSiteKeywords->data()->pages_Keywords;

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        $this->siteContent = $this->getPageContent->data()->corePages_Content;

        $loggedInUserName = new Userprofile();
        $this->username = $loggedInUserName->userName;
        $this->userLogin = $loggedInUserName->checkLoggedInUser();
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after(){}

    public function indexAction()
    {
        View::renderTemplate('blog.phtml', [
            'tabTitle' => 'Blog With Get Marvelle',
            'pageTitle' => 'Blog',
            'siteName' => $this->siteName,
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent
        ]);
    }

}