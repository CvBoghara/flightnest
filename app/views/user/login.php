<?php include_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/login.css">
<main>
<div class="login-form">
    <form action="<?php echo URLROOT; ?>/user/login" method="post">
        <h1>Login</h1>
        <div class="content">
            <div class="input-field">
                <input type="text" placeholder="Username" name="username" autocomplete="off">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" autocomplete="off">
            </div>
            <a href="#" class="link">Forgot Your Password?</a>
        </div>
        <div class="action">
            <button type="submit" name="login_but">Sign in</button>
        </div>
    </form>
</div>
</main>
<?php include_once APPROOT . '/views/inc/footer.php'; ?>
