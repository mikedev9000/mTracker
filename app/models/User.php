<?php
/**
 * Users
 *
 * @author michael1.cis@gmail.com
 */

namespace app\models;

class User extends \wilson\data\Model{

    public $validates = array(
        'username' => array( 'notEmpty', 'Username cannot be empty.'),
        'password' => array( 'notEmpty', 'Password cannot be empty',),
    );

    public static function getCurrent( ){
        $user = User::create( array(
            'username' => 'tester',
            'password' => 'test1234',
        ) );

        $user->save();

        return $user;
    }
}

