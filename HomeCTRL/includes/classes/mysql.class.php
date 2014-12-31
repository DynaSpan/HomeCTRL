<?php

/**
 * MySQL class
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */
 
class MySQL 
{
    private $developMode;
    private $_mysqlUsername;
    private $_mysqlPassword;
    private $_mysqlDatabase;
    private $_mysqlHost;
    private $_con;
    private $tempQuery;
    private $tempFetch;
    private $tempNumRows;
    
    public function __construct($strMysqlUsername, $strMysqlPassword, $strMysqlDatabase, $strMysqlHost = 'localhost', $boolDevelopMode = false)
    {
        $this->_mysqlUsername   = $strMysqlUsername;
        $this->_mysqlPassword   = $strMysqlPassword;
        $this->_mysqlDatabase   = $strMysqlDatabase;
        $this->_mysqlHost       = $strMysqlHost;
        $this->developMode      = $boolDevelopMode;
    }
    
    public function connect()
    {
        $this->_con = @mysqli_connect($this->_mysqlHost, $this->_mysqlUsername, $this->_mysqlPassword, $this->_mysqlDatabase);
        
        if (!$this->_con)
            die('Could not open MySQL connection, make sure your login details are correct');
    }
    
    public function query($query)
    {
        $this->tempQuery = @mysqli_query($this->_con, $query);
        
        if ($this->tempQuery === false)
            $this->createError();
        else
            return $this->tempQuery;
        
        $this->tempQuery = null;
    }
    
    public function fetch($query)
    {
        $this->tempFetch = @mysqli_fetch_assoc($query);
        
        if ($this->tempFetch === false)
            $this->createError();
        else
            return $this->tempFetch;
        
        $this->tempFetch = null;
    }
    
    public function num_rows($query)
    {
        $this->tempNumRows = @mysqli_num_rows($query);
        
        if ($this->tempNumRows === false)
            $this->createError();
        else
            return $this->tempNumRows;
        
        $this->tempNumRows = null;
    }
    
    public function escape($string)
    {
        return mysqli_real_escape_string($this->_con, $string);
    }
    
    public function insert_id()
    {
        return mysqli_insert_id($this->_con);
    }
    
    private function createError()
    {
        if ($this->developMode === true)
        {
            echo '<strong>MySQL ERROR:</strong><br /><br />' . mysqli_error($this->_con);
            exit;
        }
    }
}