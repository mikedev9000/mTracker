<?php

use lithium\net\http\Router;
use lithium\core\Environment;

if (!Environment::is('production')) {
	Router::connect('/test/{:args}', array('controller' => 'lithium\test\Controller'));
	Router::connect('/test', array('controller' => 'lithium\test\Controller'));
}


Router::connect('/', array( 'Pages::view', 'args' => array( 'home' ) ));

Router::connect('/pages', 'Pages::view');
Router::connect('/pages/{:args}', 'Pages::view');

Router::connect('/{:controller}/{:action}/{:args}');

?>