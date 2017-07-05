<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 5/5/17
 * Time: 6:19 PM
 */

namespace app\controller;
use core\Controller;
use core\View;
use core\Config;
use library\Models\ClientPagesModel;
use library\Models\SiteKeyWordsModel;

class Portfolioclients extends Controller
{

    public $get_page_content,
        $client_page_number,
        $keyword_type = Config::CORE_PAGES_KEYWORDS,
        $getSiteKeywords,
        $siteName,
        $siteContent,
        $username,
        $userLogin;

    private $_clientDir,
        $_clientPage,
        $_tabTitle,
        $_pageTitle,
        $_pageDescription;

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

    ####################################### START CLIENT VIEWS ###################################

    public function encompassdigitalmediaAction()
    {
        $this->client_page_number = '3845';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/encompass/index.phtml', [
            'tabTitle' => 'Encompass Digital Media',
            'pageTitle' => strtoupper('Dvidshub.net / U.S. Department of Defense (D.O.D)'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Encompass Digital Media for the U.S. Department of Defense',
            'pageContent' => $this->siteContent
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function cumminsAction()
    {
        $this->client_page_number = '3846';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/cummins/index.phtml', [
            'tabTitle' => 'Cummins Inc',
            'pageTitle' => strtoupper('Cummins Inc'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Cummins Inc',
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent,*/
        ]);

    }

    ######################  ECW  #############################

    public function ecwbouldenAction()
    {
        $this->client_page_number = '3847';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/boulden.phtml', [
            'tabTitle' => 'Boulden Inc',
            'pageTitle' => strtoupper('Boulden Inc'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Boulden Inc',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin, */
        ]);

    }

    public function ecwccstubesAction()
    {
        $this->client_page_number = '3848';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/ccstubes.phtml', [
            'tabTitle' => 'Condensor & Chiller',
            'pageTitle' => strtoupper('Condensor & Chiller'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Condensor & Chiller',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function ecwaerometalsAction()
    {
        $this->client_page_number = '3849';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/aerometals.phtml', [
            'tabTitle' => 'Aero Metals',
            'pageTitle' => strtoupper('Aero Metals'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Aero Metals',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function ecwqualityairservicesAction()
    {
        $this->client_page_number = '3850';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/qualityairservices.phtml', [
            'tabTitle' => 'Quality Air Services',
            'pageTitle' => strtoupper('Quality Air Services'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Quality Air Services',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,*/
        ]);

    }

    public function ecwleecynAction()
    {

        $this->client_page_number = '3851';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/leecyn.phtml', [
            'tabTitle' => 'Leecyn Company',
            'pageTitle' => strtoupper('Leecyn Company'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Leecyn Company',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function ecwgreenvilletoolAction()
    {

        $this->client_page_number = '3852';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/ecw/greenvilletool.phtml', [
            'tabTitle' => 'Greenville Tool',
            'pageTitle' => strtoupper('Greenville Tool'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Greenville Tool',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    ########################   FREELANCE CLIENT PAGES  #############################

    public function preputrackerAction()
    {

        $this->client_page_number = '3853';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/preputracker/index.phtml', [
            'tabTitle' => 'Prep U Tracker',
            'pageTitle' => strtoupper('Prep U Tracker'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Prep U Tracker',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }


    public function burginconstructionAction()
    {
        $this->client_page_number = '3854';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/burginconstruction/index.phtml', [
            'tabTitle' => 'Burgin Construction LLC',
            'pageTitle' => strtoupper('Burgin Construction LLC'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Burgin Construction LLC',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function mattressandthingsAction()
    {

        $this->client_page_number = '3855';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/mattressandthings/index.phtml', [
            'tabTitle' => 'Mattress & Things',
            'pageTitle' => strtoupper('Mattress & Things'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Mattress and Things',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function kingbiggieAction()
    {

        $this->client_page_number = '3856';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/kingbiggie/index.phtml', [
            'tabTitle' => 'King Biggie',
            'pageTitle' => strtoupper('King Biggie'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'King Biggie',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function homegrownmusiqAction()
    {
        $this->client_page_number = '3857';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/homegrownmusiq/index.phtml', [
            'tabTitle' => 'HomeGrownMusiQ',
            'pageTitle' => strtoupper('HomeGrownMusiQ'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'HomeGrownMusiQ',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function whoslaundryAction()
    {

        $this->client_page_number = '3858';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/whoslaundry/index.phtml', [
            'tabTitle' => 'Who\'s Laundry',
            'pageTitle' => strtoupper('Who\'s Laundry'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Who\'s Laundry',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    ############################ FREELANCE MOBILE #################################

    public function homegrownmusiqmobileAction()
    {

        $this->client_page_number = '3859';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/homegrownmusiq/mobile.phtml', [
            'tabTitle' => 'Home Grown Musiq',
            'pageTitle' => strtoupper('Home Grown Musiq'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Home Grown Musiq',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    public function whoslaundrymobileAction()
    {

        $this->client_page_number = '3860';

        $this->getPageContent = new ClientPagesModel();
        $this->getPageContent->find($this->client_page_number);
        $this->siteContent = $this->getPageContent->data()->clientPage_Content;

        View::renderTemplate('portfolioclients/whoslaundry/mobile.phtml', [
            'tabTitle' => 'Who\'s Laundry Mobile App',
            'pageTitle' => strtoupper('Who\'s Laundry Mobile App'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'Who\'s Laundry Mobile App',
            'pageContent' => $this->siteContent,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            */
        ]);

    }

    #########################  Dynamic Client Pages ################################

    public function clientsAction()
    {
        View::renderTemplate('portfolioclients/' . $this->_clientDir . '/' .$this->_clientPage, [
            'tabTitle' => $this->_tabTitle,
            'pageTitle' => strtoupper($this->_pageTitle),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => $this->_pageDescription,
            /*'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->siteContent,*/
        ]);

    }


}