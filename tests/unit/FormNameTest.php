<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 10/13/17
 * Time: 7:20 PM
 */

namespace tests\unit;

use PHPUnit\Framework\TestCase;
use App\Controller\Contact;

class FormNameTest extends TestCase {

  public function testThatContactFormNameExist(){

    $formName = new Contact();

    $formName->setFormName('conTact_Form');

    $this->assertEquals($formName->getFormName(), $formName->indexAction()->formName);

  }

}