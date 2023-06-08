<?php 

class Connect{
    protected $db_name = DB_NAME;
    protected $host = HOST_NAME;
    public static $dbh;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            if(self::$dbh == null){
                self::$dbh = new PDO($dsn, 'root', '', $option);
                return self::$dbh;
            }
        }catch(PDOException $e) {
            die($e->getMessage());
        }
    }

}