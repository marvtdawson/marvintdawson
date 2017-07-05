<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 5/9/17
 * Time: 11:56 AM
 */

namespace library\Models;
use Exception;


class ClientPagesModel extends Model
{

    public $fields,
        $_pdo,
        $edit_page_content,
        $_tableName = 'cli3ntPag3s';

    public static $handler,
        $entries = null,
        $corePagesName;

    private $_db,
        $_data,
        $_isLoggedIn;

    /**
     * connect to db and table
     *
     */
    public function __construct()
    {
        //parent::__construct(); // connect to db via parent class

        // connect to db
        $this->_db = Model::getInstance();

    }

    /**
     * Before filter which is useful for login authentication
     *
     * @return void
     */
    protected function before(){}

    /**
     * After filter which could potentially be good for destroying sessions
     *
     * @return void
     */
    protected function after(){}

    /**
     * @param null $pageInfoNumber
     * @return bool
     *
     * Find user data in table
     *
     */
    public function find($pageInfoNumber = null){  // search for user provided info
        if($pageInfoNumber){ // if userInfo not equal to null, proceed

            // set field var to get either table id via potential member number
            $field = (is_numeric($pageInfoNumber)) ? 'clientPage_Number' : '';

            $data = $this->_db->get($this->_tableName, array($field,'=', $pageInfoNumber));

            // data is equivalent to rows, count() = 0 on Model class
            if($data->count()){
                // take first and only result found in table
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }


    public function update($tableName, $fields = array(), $id =  null)
    {
        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id;
        }

        if(!$this->_db->update($tableName, $id, $fields)){
            throw new Exception('There was a problem updating your account.');
        }
    }

    /**
     * @return mixed
     * return all of this page data in table as string
     */
    public function data(){
        return $this->_data;
    }

    /**
     * @return mixed
     */
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}