<?php

namespace app\tests\cases\models;

use app\models\User;

class UserTest extends \lithium\test\Unit{

    public function setUp( ){
        $this->fixture = User::getCurrent();
    }

    public function tearDown( ){
        $this->fixture->delete();
    }

    public function test_properties(){
        $this->assertIdentical( 'tester', $this->fixture->username );

        $this->assertIdentical( 'test1234', $this->fixture->password );

        $this->assertFalse( $this->fixture->errors(), 'The user should not have any errors set.' );
    }
}
