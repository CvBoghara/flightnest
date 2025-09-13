<?php
include_once 'helpers/helper.php';
subview('header.php');

require 'helpers/init_conn_db.php';

$error = '';
$success = '';
$showPasswordForm = false;
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset-req-submit'])) {
        $email = $_POST['user_email'];

        if (empty($email)) {
            $error = 'Please enter your email address.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format.';
        } else {
            $sql = "SELECT email FROM users WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $showPasswordForm = true;
                } else {
                    $error = 'Email address not found.';
                }
            } else {
                $error = 'An error occurred. Please try again later.';
            }
            mysqli_stmt_close($stmt);
        }
    } elseif (isset($_POST['new-pwd-submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($password) || empty($confirm_password)) {
            $error = 'Please enter and confirm your new password.';
            $showPasswordForm = true;
        } elseif ($password !== $confirm_password) {
            $error = 'Passwords do not match.';
            $showPasswordForm = true;
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password=? WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $email);
                mysqli_stmt_execute($stmt);
                $success = 'Your password has been updated successfully. You can now <a href="login.php">login</a>.';
            } else {
                $error = 'An error occurred. Please try again later.';
                $showPasswordForm = true;
            }
            mysqli_stmt_close($stmt);
        }
    }
}

mysqli_close($conn);
?>

<link rel="stylesheet" href="assets/css/login.css">
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
h1 {
   font-family :'product sans' !important;
   font-size:48px !important;
   margin-top:20px;
   text-align:center;
}
body {
  background: #bdc3c7;
  background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);
  background: linear-gradient(to right, #2c3e50, #bdc3c7);
}
.login-form {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 0px;
}
</style>

<div class="flex-container">
    <div class="login-form mt-5" style="height: auto; padding-bottom: 20px;">
        <h1 class="text-center text-secondary mb-4">Reset Password</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert" style="margin: 0 60px;"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success" role="alert" style="margin: 0 60px;"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <!-- Do not show any form if password reset was successful -->
        <?php elseif ($showPasswordForm): ?>
            <form method="POST" action="reset-pwd.php">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <div class="flex-container">
                    <div>
                        <i class="fa fa-lock text-primary"></i>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="New Password" class="form-input" required>
                    </div>
                </div>
                <div class="flex-container">
                    <div>
                        <i class="fa fa-lock text-primary"></i>
                    </div>
                    <div>
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" class="form-input" required>
                    </div>
                </div>
                <div class="submit">
                    <button name="new-pwd-submit" type="submit" class="button">Set New Password</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert text-center alert-info mb-0" style="margin-left: 60px; margin-right:60px;" role="alert">
                Enter your registered email to reset your password.
            </div>
            <form method="POST" action="reset-pwd.php">
                <div class="flex-container">
                    <div>
                        <i class="fa fa-envelope text-primary"></i>
                    </div>
                    <div>
                        <input type="text" name="user_email" placeholder="Enter your registered email-id" class="form-input" required>
                    </div>
                </div>
                <div class="submit">
                    <button name="reset-req-submit" type="submit" class="button">Submit</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<?php subview('footer.php'); ?>