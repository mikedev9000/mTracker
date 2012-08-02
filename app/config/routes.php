<?php

use lithium\net\http\Router;
use lithium\core\Environment;

if (!Environment::is('production')) {
	Router::connect('/test/{:args}', array('controller' => 'lithium\test\Controller'));
	Router::connect('/test', array('controller' => 'lithium\test\Controller'));
}

/**
 * RESTful api routes for Mongo objects
 * 
 * TODO: get the restful json routes to pull all projects (none so far)
 */
foreach( \lithium\core\Libraries::locate('models') as $model )
{
    $model_slug = str_replace('\\', '-', $model);
    
    Router::connect("rest/{$model_slug}", array( 
    	'controller' => 'Entities', 
    	'action' => 'all',
        'type' => 'json',
    ));
    
    Router::connect("rest/{$model_slug}/{:id:[0-9a-f]{24}}/{:function}", array( 
    	'controller' => 'Entities', 
    	'action' => 'one',
        'model' => $model,
        'function' => null,
        'type' => 'json',
    ));
}


Router::connect('/', 'Pages::view');
Router::connect('/{:args}', 'Pages::view');

//Router::connect('/{:controller}/{:action}/{:args}');

?>