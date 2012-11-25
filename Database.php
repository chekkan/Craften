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
            $type = $this->getType();
    
            if (empty($type))
            {
                $configuration = Registry::get("configuration");

                if ($configuration)
                {
                    $configuration = $configuration->initialize();
                    $parsed = $configuration->parse("../app/configuration/database");
                    
                    if (!empty($parsed->database->default) && !empty($parsed->database->default->type))
                    {
                        $type = $parsed->database->default->type;
                        unset($parsed->database->default->type);

                        $this->__construct(array(
                            "type" => $type,
                            "options" => (array) $parsed->database->default
                        ));
                    }
                }
            }

            if (empty($type))
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
