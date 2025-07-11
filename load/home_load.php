<?php
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/user.class.php';
include $_SERVER['DOCUMENT_ROOT'].'/web_app/class/userSession.class.php';
include_once($_SERVER['DOCUMENT_ROOT'].'/web_app/class/session.class.php');
Session::sessionStart();
$user=UserSession::autherized('token');
$response=[];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Segoe UI', sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-box {
            background: rgba(0, 0, 0, 0.4);
            padding: 40px 60px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 30px rgba(0,0,0,0.3);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <?php
        if($user){
            $obj=new User();
            $obj->fetchUserData($user);
            $response['name']=$obj->data['name'];
            
            echo "<h1>Welcome {$response['name']}</h1>";
            echo '<a class="logout-btn" href="/web_app/load/logout_load.php">Logout</a>';
        }else{
            $response['url']='/web/template/login.php';
            echo json_encode($response);
        }
        ?>
    </div>
</body>
</html>
