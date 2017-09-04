<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 7/14/17
 * Time: 2:48 PM
 */

namespace library\test;

/**
 * Class Author
 */
class Author
{
    protected $email = null;
    protected $name = null;

    /**
     * Author constructor.
     * check if all vars are set
     *
     * @param string $email
     * @param string $name
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name  = $name;

    }

}