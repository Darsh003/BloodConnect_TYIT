
<?php
include "../config/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and email from the form
    $username = $_POST["user_name_login"];
    $email = $_POST["user_email_login"];

    if($username !='' && $email !=''){

        $sql = "SELECT * from `user_info` where user_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $num = count($rows);
        @$res_email = $rows[0]['user_email'];

        if($num == 1 && $res_email == $email){
            $password = $rows[0]['og_password'];
            $mail = require __DIR__ . "/mailer.php";
            $mail->setFrom('noreply@gmail.com');
            $mail->addAddress($email);
            $mail->Subject = "Password Recovery for BloodConnect";
            $mail->Body =<<<END
            Hello! $username. Your Password For BloodConnect login page is <b>$password</b>.
            END;

            try{
                $check = $mail->send();
                if($check){
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                Mail Sent. please check your inbox.
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
                }
            }catch(Exception $e){
                // echo "unable to send message at this time.";
                echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                unable to send message at this time.
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
            }
        }
        else if($res_email != $email){
            echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                Invalid Email.
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
        }
        else{
            echo '<!-- HTML structure for the modern alert -->
                <div class="login-alert">
                Invalid Username.
                <span class="alert-close" onclick="this.parentElement.style.display=`none`;"></span>
                </div>
                ';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodConnect - Forget Password</title>
    <link rel="stylesheet" href="php_css/forget.css">
</head>

<body>
    <div class="forget_password-container">
        <div class="form-container forget-container">
            <form class="forget-form" action="" method="post">
                <h1>Forget Password</h1>
                <span>Enter your Username and Email</span>
                <input type="text" placeholder="Name (max length 11)" maxlength=11 name="user_name_login" id="user-name-login" required />
                <input type="email" placeholder="Email" name="user_email_login" id="user-email-login" autocomplete="username" required />
                <a href="../login.php">Back to Login page</a>
                <button type="submit" class="forget" id="forget_id">Proceed</button>
            </form>
        </div>
    </div>
</body>

</html>