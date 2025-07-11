<?php
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/user.class.php';
if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['dob'])){

    $orginalname=$_POST['name'];
    $orginalUsername=$_POST['username'];
    $orginaldob=$_POST['dob'];

    $name=htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $username=htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $password=$_POST['password']; // I will hash this password so i don't sanitize this here.
    $dob=htmlspecialchars(trim($_POST['dob']), ENT_QUOTES, 'UTF-8');

    if($orginalname===$name && $orginalUsername===$username && $orginaldob===$dob){
        User::createUser($name,$username,$password,$dob);
    }else{
        header('location: /web_app/template/kidde.php');
    }
}else{
    echo'not set yet';
}
