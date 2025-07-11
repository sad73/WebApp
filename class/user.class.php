<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/database.class.php');


class User{
    public $data=null;
    //To Check if usernmae already exist
    public function usernameExisit($username){
        $conn=Database::createDbConnection();
        $sql="SELECT username FROM `user` WHERE `username`='$username'";
        if($conn->query($sql)->num_rows==1){
            return true;
        }else{
            return false;
        }
    }
    public function fetchUserData($username){
        $conn=Database::createDbConnection();
        $sql="SELECT * FROM `user` WHERE `username`='$username' OR `id`='$username'";
        $result=$conn->query($sql);
        if($result->num_rows== 1){
            $row= $result->fetch_assoc();
            $this->data=$row;
            return $row;
        }else{
            return false;
        }
    }
    public static function createUser($name,$username,$password,$dob){
        $obj=new User();
        if($obj->usernameExisit($username)){
            echo "username already exisit";
            return false;
        }else{
            $conn = Database::createDbConnection();
            $sql = "INSERT INTO `user`(`name`,`username`, `password`, `dob`) VALUES(?, ?, ?, ?)";
            $senitize = $conn->prepare($sql);

            if ($senitize){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
                $senitize->bind_param("ssss", $name, $username, $hashedPassword, $dob);
                if ($senitize->execute()){
                    header("Location: /web_app/template/login.php");
                    exit();
                }else{
                    header('location: /web_app/template/kidde.php');
                }

                $senitize->close();
            }else{
                echo "Error preparing statement.";
            }
        }
    }
    public static function login($username, $password) {
        $conn = Database::createDbConnection();
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE `username` = ?");
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $obj = new User();
                $obj->fetchUserData($username);
                return $obj->data['id'];
            }
        }
        return false;
    }
    public static function logut(){
        Session:destroy();
        header("Location: /web/template/login.php");
    }
}