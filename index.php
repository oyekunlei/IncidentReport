<?php require_once './includes/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="new-form">
            <?php require_once './includes/alert.php'; ?>
            <form method="POST" action="src/login.php">
                <legend>Login</legend>
                <input class="form-control" name="username" type="text" id="username" placeholder="Username"/>
                <span class="error" id="username_error">* Please enter a valid username</span>
                <input class="form-control" name="password" type="password" id="password" placeholder="Password"/>
                <span class="error" id="password_error">* Please enter a valid password</span>
                <button name="login" id="login-btn" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>