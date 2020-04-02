
<?php 
abstract class Model
{
    protected $dbh;
    protected $stmt;
    
    public function __construct()
    {
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=". DB_NAME, DB_USER, DB_PASS);
    }

    // Query Method
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

/*
    ****************
    * Data Bind
    ****************
    */

    public function bind($param, $value, $type = null)
    {
        // Check what type data is passed
        if (is_null($type)) {
            switch (true) {
                case is_null($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        // Bind value
        $this->stmt->bindValue($param, $value, $type);
    }

    /*
    ****************
    * Execution
    ****************
    */

    public function execute()
    {
        $this->stmt->execute();
    }

    /*
    ****************************
    * Data fetching (Result Set)
    ****************************
    */

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    /*
    ****************************
    * Last Insert Id
    ****************************
    */

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    /*
    ****************************
    * Single record (Login)
    ****************************
    */  
    
    public function singleRecord()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}