<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mysql
 *
 * @author Harish
 */

namespace Craften\Database\Connector {

    class Mysql extends Database\Connector
    {
        protected $_service;
        
        /**
         * @readwrite 
         */
        protected $_host;
        
        /**
         * @readwrite 
         */
        protected $_username;
        
        /**
         * @readwrite 
         */
        protected $_password;
        
        /**
         * @readwrite 
         */
        protected $_schema;
        
        /**
         * @readwrite 
         */
        protected $_port = "3306";
        
        /**
         * @readwrite 
         */
        protected $_charset = "utf8";
        
        /**
         * @readwrite 
         */
        protected $_engine = "InnoDB";
        
        /**
         * @readwrite 
         */
        protected $_isConnected = false;
        
        // checks if connected to database
        protected function _isValidService()
        {
            $isEmpty = empty($this->_service);
            $isInstance = $this->_service instanceof \MySQLi;
            
            if($this->isConnected && $isInstance && !$isEmpty)
            {
                return true;
            }
            
            return false;
        }
        
        // connects to the database
        public function connect()
        {
            if(!$this->_isValidService())
            {
                $this->_service = new MySQLi(
                        $this->_host,
                        $this->_username,
                        $this->_password,
                        $this->_schema,
                        $this->_port
                        );
                
                if($this->_server->connect_error)
                {
                    throw new Exception\Service("Unable to connect to service");
                }
                
                $this->isConnected = true;
            }
            
            return $this;
        }
        
        // disconnects from the database
        public function disconnect()
        {
            if($this->_isValidService())
            {
                $this->isConnected = false;
                $this->_service->close();
            }
            
            return $this;
        }
        
        // returns a corresponding query instance
        public function query()
        {
            return new Database\Query\Mysql(array(
                "connector" => $this
            ));
        }
        
        // executes the provided SQL statement
        public function execute($sql)
        {
            if(!$this->_isValidService())
            {
                throw new Exception\Service("Not connected to a valid service");
            }
            
            return $this->_service->query($sql);
        }
        
        // escapes  the provided value to make it safe for queries
        public function escape($value)
        {
            if(!$this->_isValidService())
            {
                throw new Exception\Service("Not connected to a valid service");
            }
            
            return $this->_service->real_escape_string($value);
        }
        
        // returns the id of last row insterted
        public function getLastInsertId()
        {
            if(!$this->_isValidService())
            {
                throw new Exception\Service("Not connected to a valid service");
            }
            
            return $this->_service->insert_id();
        }
        
        // returns the number of rows affected
        // by the last SQL query executes
        public function getAffectedRows()
        {
            if(!$this->_isValidService())
            {
                throw new Exception\Service("Not connected to a valid service");
            }
            
            return $this->_service->affected_rows;
        }
        
        // returns the last error occured
        public function getLastError()
        {
            if(!$this->_isValidService())
            {
                throw new Exception\Service("No connected to a valid service");
            }
            
            return $this->_service->error;
        }
    }
}
?>
