<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 7/12/17
 * Time: 6:01 PM
 */

namespace app\controller;

use core\Controller;
use core\View;
use core\Config;
use library\Models\CorePagesModel;
use library\Models\SiteKeyWordsModel;
use library\test\Author;
use library\test\Article;



class Imarc extends Controller
{
    public $get_page_content,
        $core_page_number,
        $keyword_type = Config::CORE_PAGES_KEYWORDS,
        $getSiteKeywords,
        $siteName,
        $siteContent,
        $username,
        $userLogin,
        $articles,
        $auth,
        $title,
        $body,
        $stat,
        $show_articles,
        $author,
        $email,
        $name;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);

        $this->articles = new Article();
        $this->author = new Author($this->email, $this->name);
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
        $this->core_page_number = '1142';

        $this->getPageContent = new CorePagesModel();
        $this->getPageContent->find($this->core_page_number);
        $this->siteContent = $this->getPageContent->data()->corePages_Content;

        View::renderTemplate('imarc/index.phtml', [
            'tabTitle' => 'iMarc Test',
            'pageTitle' => strtoupper('iMarc Test'),
            'siteName' => $this->siteName,
            'siteKeywords' => $this->siteKeywords,
            'pageDescription' => 'This is the iMarc Test for a job opportunity.',
            'username' =>  $this->username,
            'userLogin' => $this->userLogin,
            'pageContent' => $this->show_articles,
        ]);

        $articles_data = file_get_contents('imarc_article.json');
        $json_items = json_decode($articles_data, true);

        $article_info = $this->articles->validate($this->auth, $this->title, $this->body, $this->stat);

        foreach($json_items['topics'] as $arts){

            $auth  = $this->articles->validateAuthor($arts['author']);
            $title = $this->articles->validateTitle($arts['title']);
            $body  = $this->articles->validateBody($arts['body']);
            $img   = $arts['image'];
            $stat  = $this->articles->validateStatus($arts['status']);

            $this->show_articles .= "<div class=\"individual-article-wrapper\">";
            $this->show_articles .= "<div class=\"article-info-wrapper\">";
            $this->show_articles .= "<div class=\"article-summary-text\">";
            $this->show_articles .= "<div>Article: " . $title . "</div>";
            $this->show_articles .= "<div>Author: " . $auth . "</div>";
            $this->show_articles .= "</div>";
            $this->show_articles .= "<div class=\"article-summary-text\">";
            $this->show_articles .= "<p>" . $body . "</p>";
            $this->show_articles .= "</div>";
            $this->show_articles .= "</div>"; // #end article-info-wrapper
            $this->show_articles .= "<div class=\"article-img-wrapper\">";
            $this->show_articles .= "<img src=\"" . $img . "\">";
            $this->show_articles .= "</div>"; // #end article-img-wrapper
            $this->show_articles .= "</div>";
            $this->show_articles .= "<hr />";
        }

        return $this->show_articles;
    }

    public function articlesAction()
    {

    }

}