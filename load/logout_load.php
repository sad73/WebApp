<?php
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/user.class.php';
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/userSession.class.php';
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/session.class.php');
Session::sessionStart();

$_GET['active']=0;

if(isset($_GET['active']) && $_GET['active'] == 0){
    $conn=Database::createDbConnection();
    $token=Session::get('token');
    $ql="UPDATE `user_session` SET active=0 WHERE token='$token'";
    if($conn->query($ql)) {
        Session::unset(Session::get('token'));
        Session::destroy();
        header('location: /web_app/template/login.php');
    }else{
        echo "sql error";
    }
}else{
    echo "Something error";
}