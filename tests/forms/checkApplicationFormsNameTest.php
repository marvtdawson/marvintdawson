<?php
/**
 * Created by PhpStorm.
 * User: katan-hgmhub
 * Date: 9/17/17
 * Time: 7:55 PM
 */

namespace tests\forms;


use PHPUnit\Framework\TestCase;

class checkApplicationFormsNameTest extends TestCase {

  public $formIdName = "";

  /**
   * @test
   */
  public function setUp(){

    $this->assertEmpty($this->formIdName);

    return $this->formIdName;
  }

  /**
   * @return string
   *
   */
  public function testFormIdNameNotEmptyTest($formIdName){

      $this->assertNotEmpty($this->formIdName);

    return $this->formIdName;
  }

  protected function tearDown(){

  }

}