<?php
class Database{
    public static $conn=null;
    public static function createDbConnection(){
        if(Database::$conn==null){
            $config=json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/../db_config.json"),true); // Learn From SNA 
            $host=$config["host"];
            $username=$config["user"];
            $password=$config["pass"];
            $db=$config["db"];

            
            $conn=new mysqli($host,$username,$password,$db);
            if ($conn->connect_error) {
                die("Error to connect database". $conn->connect_error);
            }else{
                // echo "New Connection Established";
                Database::$conn=$conn;
                return Database::$conn;
            }
        }else{
            // echo"Exisiting connection established";
            return Database::$conn;
        }
    }
}