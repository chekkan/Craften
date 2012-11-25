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

namespace Craften\Database\Query {

    use Craften\Database as Database;
    
    class Mysql extends Database\Query {

        public function all()
        {
            $sql = $this->_buildSelect();
            
            $result = $this->_connector->execute($sql);
            
            if($result == false)
            {
                $error = $this->_connector->lastError;
                throw new \Exception("There was an error with your SQL query: {$error}");
            }
            
            $rows = array();
            
            for ($i=0; $i<$result->num_rows; $i++)
            {
                $rows[] = \Craften\ArrayMethods::toObject($result->fetch_array(MYSQL_ASSOC));
            }
            
            return $rows;
        }
    }

}
?>
