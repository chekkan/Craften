<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connector
 *
 * @author Harish
 */

namespace Craften\Database {
    
    use Craften\Base as Base;
    use Craften\Database\Exception as Exception;

    class Connector extends Base {
        public function initialize()
        {
            return $this;
        }
        
        protected function _getExceptionForImplementation($method)
        {
            return new Exception\Implementation("{$method} method not implementation");
        }
    }

}
?>
