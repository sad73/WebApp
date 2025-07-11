<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Signup Page</title>
  <style>
    /* Reset some default styles */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }

    .signup-form {
      background: white;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
      width: 350px;
      max-width: 90%;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: transform 0.3s ease;
    }

    .signup-form:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    }

    .signup-form h2 {
      margin-bottom: 30px;
      font-size: 2.2rem;
      color: #4b4b7d;
      letter-spacing: 1.2px;
    }

    .signup-form input {
      width: 100%;
      padding: 14px 18px;
      margin: 10px 0;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .signup-form input:focus {
      border-color: #667eea;
      outline: none;
      box-shadow: 0 0 5px #667eea;
    }

    .signup-form button {
      width: 100%;
      padding: 14px;
      margin-top: 25px;
      background: #667eea;
      border: none;
      border-radius: 10px;
      font-size: 1.1rem;
      font-weight: 600;
      color: white;
      cursor: pointer;
      letter-spacing: 0.05em;
      transition: background 0.3s ease;
    }

    .signup-form button:hover {
      background: #5563c1;
    }

    /* Responsive small screen */
    @media (max-width: 400px) {
      .signup-form {
        padding: 30px 20px;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <form class="signup-form" action="/web_app/load/signup_load.php" method="POST" autocomplete="off">
    <h2>Sign Up</h2>
    <input type="text" name="name" placeholder="Full Name" required autocomplete="name" />
    <input type="text" name="username" placeholder="Username" required autocomplete="username" />
    <input type="password" name="password" placeholder="Password" required autocomplete="new-password" />
    <input type="date" name="dob" placeholder="Date of Birth" required />
    <button type="submit">Create Account</button>
  </form>
</body>
</html>
