<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Lillyherbals</title>
    <style>
        /* Menu Section Styles */
        .menu-container {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #4CAF50;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        
        .menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .logo span {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 20px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .nav-links a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .nav-links a.active {
            background-color: rgba(255,255,255,0.2);
        }
        
        /* Forgot Password Form Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2e1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding-top: 70px; /* Space for fixed menu */
            background-image: url("images/hero.jpg");
            background-size: cover;
            background-position: center;
        }
        
        .forgot-password-container {
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 2px solid #4CAF50;
            margin: 20px;
        }
        
        .forgot-password-container h2 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #2e7d32;
        }
        
        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            color: #388e3c;
            margin-bottom: 8px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #a5d6a7;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 2px rgba(76,175,80,0.2);
        }
        
        .reset-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        
        .reset-button:hover {
            background-color: #388e3c;
        }
        
        .back-to-signin {
            margin-top: 15px;
            font-size: 15px;
        }
        
        .back-to-signin a {
            color: #1b5e20;
 text-decoration: none;
            font-weight: 500;
        }
        
        .back-to-signin a:hover {
            text-decoration: underline;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .menu {
                flex-direction: column;
                padding: 10px;
            }
            
            .logo {
                margin-bottom: 10px;
            }
            
            .nav-links {
                width: 100%;
                justify-content: space-around;
            }
            
            .nav-links li {
                margin: 0;
            }
            
            body {
                padding-top: 120px;
            }
        }
        
        @media (max-width: 480px) {
            .forgot-password-container {
                padding: 20px 15px;
            }
            
            .forgot-password-container h2 {
                font-size: 24px;
            }
            
            .nav-links a {
                padding: 6px 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Menu Section -->
    <div class="menu-container">
        <div class="menu">
            <div class="logo">
                <img src="images/logo.png" alt="Lillyherbals Logo">
                <span>LILLYHERBALS</span>
            </div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="product.html">Products</a></li>
                <li><a href="client.html">Clients</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="signin.html">Sign In</a></li>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </div>
    </div>

    <!-- Forgot Password Form -->
    <div class="forgot-password-container">
        <h2>Reset Your Password</h2>
        <form action="reset_password.php" method="POST">
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
    </div>
    <button type="submit" class="reset-button">submit</button>
</form>
        <div class="back-to-signin">
            <a href="signin.html">Back to Sign In</a>
        </div>
    </div>
</body>
</html>