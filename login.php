<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodConnect - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="alert-container">
        <?php  
            include 'php/signUp.php';
            include 'php/signIn.php';

            if($loginerror == 1){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                wrong password !
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }

            if($loginerror == 2){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                User not found
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }

            if($showError == 1){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                Passowords did not matched !!!
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }
            
            if($showError == 2){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                password requirements not met !!!
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }
            
            if($showAlert == 1){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                registered successfully
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }

            if($exists == 1){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                user already exists
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }
        ?>
    </div>


        <div class="login_container" id="login-container">
            <div class="form-container sign-up-container">
                <form class="signUp-form" action="" method="post">
                    <h1>Create Account</h1>
                    <span>use your email for registration</span>
                    <input type="text" placeholder="Name (max length 11)" maxlength=11 name="user_name" id="user_name" required/>
                    <input type="email" placeholder="Email" name="user_email" id="user-email" autocomplete="username"required/>
                    <input type="password" placeholder="Password" name="password" id="user-password" autocomplete="new-password" required/>
                    <input type="password" placeholder="Confirm_Password" name="conf_password" id="conf-password" autocomplete="new-password" required/>
                    <p style="font-size: 0.5rem; color: red; margin: 0px 0px 10px 0px">password should be minimun 8 characters long and must contain atleast one Uppercase,Lowercase and Special characters.</P>
                    <button type="submit"  class="sign-Up" id = "sign-UP">Sign Up</button>
                </form>
                </div>


            
            <div class="form-container sign-in-container">
                <form class="signIn-form" action="" method="post">
                    <h1>Sign in</h1>
                    <span>to use your account</span>
                    <input type="text" placeholder="Name (max length 11)" maxlength=11 name="user_name_login" id="user-name-login" autocomplete="username" required/>
                    <input type="password" placeholder="Password" name="password_login" id="user-password-login" autocomplete="current-password" required/>
                    <a href="php/forget.php">Forgot your password?</a>
                    <button type="submit" class="sign-In" id="sign-In">Sign In</button>
                </form>
                
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="js/login.js"></script>
</body>

</html>