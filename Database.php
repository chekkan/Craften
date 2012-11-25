<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Harish
 */

namespace Craften {
    
    use Craften\Base as Base;
    use Craften\Database as Database;
    use Craften\Database\Exception as Exception;

    class Database extends Base 
    {
        /**
         * @readwrite 
         */
        protected $_type;
        
        /**
         * @readwrite 
         */
        protected $_options;
        
        protected function _getExceptionForImplementation($method)
        {
            return new Exception\Implementation("{$method} method not implemented");
        }
        
        public function initialize()
        {
            if(!$this->type)
            {
                throw new Exception\Argument("Invalid type");
            }
            
            switch($this->type)
            {
                case "mysql":
                {
                    return new Database\Connector\Mysql($this->options);
                    break;
                }
                default:
                {
                    throw new Exception\Argument("Invalid type");
                    break;
                }
            }
        }
    }

}
?>
