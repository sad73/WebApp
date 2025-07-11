<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kidde Warning</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to right, #f12711, #f5af19);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);
        }
        .warning-box{
            background: rgba(0, 0, 0, 0.3);
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            animation: pulse 2s infinite;
        }

        .warning-box h1{
            font-size: 36px;
            margin: 0;
        }

        @keyframes pulse{
            0% {transform: scale(1);}
            50% {transform: scale(1.03);}
            100% {transform: scale(1);}
        }
    </style>
</head>
<body>
    <div class="warning-box">
        <h1>🚫 Don't make fool my Kidde site 😎</h1>
    </div>
</body>
</html>
