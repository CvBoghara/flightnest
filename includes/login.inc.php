<?php
if(isset($_POST['login_but'])) {
    require '../helpers/init_conn_db.php';   
    $email_id = $_POST['user_id'];
    $password = $_POST['user_pass'];
    $sql = 'SELECT * FROM Users WHERE username=? OR email=?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../login.php?error=sqlerror');
        exit();            
    } else {
        mysqli_stmt_bind_param($stmt,'ss',$email_id,$email_id);            
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
            $pwd_check = password_verify($password,$row['password']);
            if($pwd_check == false) {
                header('Location: ../login.php?error=wrongpwd');
                exit();    
            }
            else if($pwd_check == true) {
                session_start();
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION['userUid'] = $row['username'];
                $_SESSION['userMail'] = $row['email'];
                setcookie('Uname', $email_id, time() + (86400 * 30), "/");
                setcookie('Upwd', $password, time() + (86400 * 30), "/");

                // Send login success email
                require '../helpers/email_helper.php';
                $subject = 'FlightNest - Login Successful';
                $body = "
                    <h2>Login Successful</h2>
                    <p>Dear {$row['username']},</p>
                    <p>You have successfully logged in to your FlightNest account.</p>
                    <p>If this was not you, please contact support immediately.</p>
                    <p>Best regards,<br>FlightNest Team</p>
                ";
                $email_result = sendEmail($row['email'], $subject, $body, $row['email']);
                if ($email_result !== true) {
                    error_log("Login email failed for {$row['email']}: $email_result");
                }

                header('Location: ../index.php?login=success');
                exit();
            } else {
                header('Location: ../login.php?error=invalidcred');
                exit();                    
            }
        }
        header('Location: ../login.php?error=invalidcred');
        exit();         
    }
    header('Location: ../login.php?error=invalidcred');
    exit();      
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header('Location: ../login.php');
    exit();  
}    