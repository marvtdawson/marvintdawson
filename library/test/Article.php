<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 7/14/17
 * Time: 2:48 PM
 */

namespace library\test;
use LogicException;
use JsonSerializable;
use Exception;

class Article extends Author implements JsonSerializable
{

    protected $author = '';
    protected $title = '';
    protected $body = '';
    protected $status = '';
    protected $logic_err;
    protected $email = '',
        $name = '';

    public function __construct()
    {
        $this->logic_err = new LogicException();
        $this->author = parent::__construct($this->email, $this->name);
    }

    /**
     * Get author name
     *
     * @return string
     */
    public function getAuthorName(){
        return $this->author;
    }

    /**
     * Set Author's name
     *
     * @param $authorName
     */
    public function setAuthorName($authorName){
        $this->author->name = $authorName;
    }

    /**
     * Get Author Email
     *
     * @return string
     */
    public function getAuthorEmail(){
        return $this->author->email;
    }

    /**
     * Set Author's email
     *
     * @param $authorEmail
     */
    public function setAuthorEmail($authorEmail){
        $this->author->email = $authorEmail;
    }

    /**
     * Gets the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Gets the body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * Gets the status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Sets the title parameter
     *
     * @param string $title The article title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Sets the body parameter
     *
     * @param string $body The article body
     *
     * @return void
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
    /**
     * Validate the object.
     *
     * Ensure that the title, body, status, and author have been set.
     * Ensure that the title is not longer than 80 characters.
     * Ensure that the body has no HTML tags.
     * Ensure that the status is either 'Active' or 'Inactive'.
     *
     * If any assertions fail, a LogicException will be thrown with
     * appropriate messages.
     *
     * @throws LogicException
     * @param string $title
     * @param string $body
     * @param string $status
     * @param array $author
     *
     *
     */
    public function validate($author, $title, $body, $status)
    {
        // @todo implement me!
        $this->author = $this->validateAuthor($author);
        $this->title = $this->validateTitle($title);
        $this->body = $this->validateBody($body);
        $this->status = $this->validateStatus($status);

    }

    public function validateTitle($title){
        if(!isset($title)){
            return $title = 'Title not set';
        }
        else if(isset($title)){
            try{
                $title_len = strlen(is_string($title));

                if($title_len <= 80){
                    return $title;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return true;
    }

    public function validateBody($body){
        if(!isset($body)){
            return $body = 'Body not set';
        }
        else if(isset($body)){
            try{
                $clean_body = strip_tags($body);
                return $clean_body;

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return true;
    }

    public function validateAuthor($author){
        if(!isset($author)){
            return $author = 'Author name not set';
        }
        else if(isset($author)){
            try {
                if(!empty($author) && !is_string($author)){

                    return $author = 'Unknown';
                }
                else if(!empty($author) && is_string($author)){

                    return $author;
                }

            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return false;
    }

    public function validateStatus($status){
        if(!isset($status)){
            return $status = 'Status not set';
        }
        else if(isset($status)){
            try {
                if ($status === 'Active') {
                    return $status = 'Active';
                }
                else if($status === 'Inactive'){
                    return $status = 'Inactive';
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return false;
    }

    public function jsonSerialize()
    {
        return $this->body;
    }


}