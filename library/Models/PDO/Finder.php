<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 11/10/17
 * Time: 8:05 PM
 */

namespace library\Models\PDO;

use DateTime;

class Finder {

  protected $newDate;

  public function thisNewDate() {
    if(!null === $this->newDate) {
      echo $this->newDate = new DateTime();
    }
  }

}