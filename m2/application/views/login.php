<<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/css_login.css');?>">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap">
                        <p class="form-title">
                            Silahkan Masuk</p>
                        <form class="login" action="<?php echo site_url('auth/user_login_process');?>" method="post">
                        <input type="text" placeholder="Username" id="username" name="username" required/>
                        <input type="password" placeholder="Password" id="password" name="password" required/>
                        <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
    <script src="<?php echo site_url('resources/js/login_js.js');?>"></script>
</html>