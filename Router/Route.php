<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Route
 *
 * @author Harish
 */

namespace Craften {
    
    use Craten\Base as Base;

    class Route extends Base {
        /**
         * @readwrite 
         */
        protected $_pattern;
        
        /**
         * @readwrite 
         */
        protected $_controller;
        
        /**
         * @readwrite 
         */
        protected $_action;
        
        /**
         * @readwrite 
         */
        protected $_parameters = array();
        
        public function _getExceptionForImplementation($method)
        {
            return new \Exception\Implementation("{$methods} method now implemented");
        }
    }

}
?>
