<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/database.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/user.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/session.class.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/userSession.class.php');
class UserSession{
    public $uid=null;
    public function __construct($token){
        $conn=Database::createDbConnection();
        $sql="SELECT `uid` FROM `user_session` WHERE `token`='$token'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $row= $result->fetch_assoc();
            $this->uid=$row["uid"];
        }
    }
    public static function authenticate($username,$password){
        $usrId=null;
        $usrId=User::login($username,$password);
        if($usrId!=null){
            $conn=Database::createDbConnection();
            $uid=$usrId;
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5($ip.$agent.microtime(true));

            $sql="INSERT INTO `user_session`(uid,token,user_agent,Ip,create_at) VALUE($uid,'$token','$agent','$ip',now())";
            if($conn->query($sql)){
                Session::set("token",$token);
                $obj=new UserSession($token);
                $obj->uid=$uid;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    // public function isValid($token){
        
    // }
    public static function autherized($token){
        if(Session::isset($token)){
            $obj=new UserSession(Session::get('token'));
            return $obj->uid;
        }else{
            return false;
        }
    }
    
}