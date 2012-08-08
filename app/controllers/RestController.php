<?php

namespace app\controllers;

class RestController extends \lithium\action\Controller
{    
    /**
     * Initialize the controller and set the type to json
     */
    public function _init()
    {
        parent::_init();
        
        $this->request->type = 'json';
    }
    
    /**
     * Provides a listing of all models available to
     * the application.
     * 
     * @return array 
     */
    public function api()
    {
        $models = array();
        
        foreach( \lithium\core\Libraries::locate('models') as $model )
        {
            //TODO build out the api (functions from the class)
            $models[str_replace('\\', '-', $model)] = array(
                'model' => array(),
                'entity' => array(),
            );
        }
        
        return compact( 'models' );
    }
    
    public function model()
    {
        $model = $this->request->model;
        
        $function = isset( $this->request->function ) ? $this->request->function : 'all';
        
        $result = $model::$function();
        
        return compact( 'result' );
    }
    
    public function entity()
    {
        $model = $this->request->model;
        
        if( isset( $this->request->id ) )
        {
            $entity = $model::findFirstById( $this->request->id );
            
            if( !$entity )
                throw new \Exception( "{$model::meta('name')} not found with id {$this->request->id}" );
        }
        else 
            $entity = $model::create();
                        
        if( $this->request->data )
        {
            $function = isset( $this->request->function ) ? $this->request->function : 'save';
            
            $result = $entity->{$function}( $this->request->data );
        }
        
        $errors = $entity->errors();
        
        return compact( 'model', 'entity', 'errors', 'result' );
    }
}