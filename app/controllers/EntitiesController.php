<?php

namespace app\controllers;

class EntitiesController extends \lithium\action\Controller
{    
    public function all()
    {
        $model = $this->request->model;
        
        $all = $model::all();
        
        return compact( 'model', 'all' );
    }
    
    public function one(  )
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