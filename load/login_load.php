<?php
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/user.class.php';
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/userSession.class.php';
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/session.class.php');
Session::sessionStart();

//$_GET['active']=0;

$orginalUsername=$_POST['username'];

$usrname=htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8'); // Login Sanitization here
$password=$_POST['password']; 


$redirect=[];
$user=UserSession::autherized('token');

if($user){
    $obj=new User();
    $obj->fetchUserData($user);
    $name=$obj->data['name'];
    $redirect['status']='success';
    $redirect['username']=$name;
    $redirect['url']='/web_app/load/home_load.php';
    echo json_encode($redirect);
}else{
    $isError=UserSession::authenticate($usrname, $password);
    if(!$isError){
        $redirect['status']='fail';
        $redirect['username']=null;
        $redirect['url']=null;
        echo json_encode($redirect);
    }else{
        $redirect['status']='success';
        $redirect['username']=null;
        $redirect['url']='/web_app/load/home_load.php';
        $redirect['msg']='Welcome Back';
        echo json_encode($redirect);   
    }
}
