<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            width: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 24px;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: 0.3s;
            font-size: 14px;
        }

        .login-form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            transition: background 0.3s ease;
        }

        .login-form button:hover {
            background: #0056b3;
        }

        .login-form a {
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Times New Roman', Times, serif;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        #div1 {
            display: none;
        }
    </style>
</head>
<body>

    <div id="div1"></div>
    
    <form class="login-form" id="loginForm">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" id="user" required>
        <input type="password" name="password" placeholder="Password" id="pass" required>
        <button type="submit" id="btn">Login</button>
        <a href="signup.php">Don't have an account?</a>
    </form>

    <script>
        function login(event) {
            event.preventDefault();

            const username = document.getElementById('user').value;
            const password = document.getElementById('pass').value;
            const obj = new XMLHttpRequest();

            obj.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const responds = JSON.parse(this.responseText);
                    if (responds['status'] == 'success' && responds['username'] != null) {
                        window.location.href = responds['url'];
                    } else if (responds['status'] == 'success' && responds['username'] == null) {
                        window.location.href = responds['url'];
                    } else if (responds['status'] == 'fail' && responds['username'] == null) {
                        document.getElementById('user').style.borderColor = 'red';
                    } else if(responds['status'] == 'warning' && responds['username'] == null){
                        window.location.href = responds['url'];
                    }
                }else{
                    window.location.href = responds['url'];
                }
            };

            const url = '/web_app/load/login_load.php';
            obj.open('POST', url, true);
            obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            const postData = `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`;
            obj.send(postData);
        }

        document.getElementById('loginForm').addEventListener('submit', login);
    </script>

</body>
</html>
