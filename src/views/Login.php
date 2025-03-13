<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/public/css/stype.css">
    <script src="/public/js/htmx.min.js"></script>
</head>
<body>
<div class="login-container">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-dark">Log Into Autointegrity </h4>
                <div id="loginStatus" style="color:red;font-weight:bold;font-size:12px;"></div>
            </div>
            <div class="modal-body">
                <form method="post" action="/index.php?action=login" class="form-group modal-body" >
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="form-group">
                        <label for="username" class="col-form-label"><i>Email</i></label>
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label"><i>Password</i></label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                            Remember Me
                        </label>
                    </div>
                    <div class="d-grid gap-2" id="btnLogin">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
<!--                    <div id="login-response"></div>-->
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>