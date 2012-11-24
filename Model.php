<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Harish
 */

namespace Craften {

    class Model extends Base {
        /**
         * @readwrite
         */
        protected $_table;
        
        /**
         * @readwrite
         */
        protected $_connector;
        
        /**
         * @read
         */
        protected $_types = array (
            "autonumber",
            "text",
            "integer",
            "decimal",
            "boolean",
            "datetime"
        );
        
        protected $_columns;
        protected $_primary;
        
        public function _getExceptionForImplementation($method) {
            return new Exception\Implementation("{$method} method not implemented");
        }
    }

}
?>
