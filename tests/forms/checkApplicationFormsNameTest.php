<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 9/17/17
 * Time: 7:55 PM
 */

namespace tests\forms;



use App\Controller\About;
use App\Controller\Contact;
use PHPUnit\Framework\TestCase;

class checkApplicationFormsNameTest extends TestCase {

  public $formIdName = '';

  /**
   * @test setup
   * assert that the var is null, before each test
   *
   */
  public function setUp(){
   $this->assertEmpty($this->formIdName);
    return $this->formIdName;
  }

  /**
   * @return string
   *
   */
  public function testThatWeCanGetTheFormNameTest(){

    $contactObj = new Contact();
    $viewFormName = $contactObj->indexAction()->View::renderTemplate()->formName;
    $this->assertNotEmpty($viewFormName);

    //console.log($viewFormName);

    return $viewFormName;
  }


  /**
   * @test tearDown
   */
  public function tearDown(){
     /* unset($this->formIdName);*/
  }

}