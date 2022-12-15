<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Base Account</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="./css/loading.css">
    <link rel="stylesheet" type="text/css" href="./css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="./scripts/Loading.js"></script>
    <script type="text/javascript" src="./scripts/Login.js"></script>
    <!-- <script src='../shared-components/Loading.js'></script> -->
</head>

<body>
    <div id='alert-wrap' style='display:none'>
        <div id='alert'>
            <div id='alert-close' onclick="$('#alert-wrap').hide()">
                <span>x</span>
            </div>
            <div id='alert-content'>
                Invalid whatever
            </div>
            <div id='alert-button' onclick="$('#alert-wrap').hide()">
                OK
            </div>
        </div>
    </div>
    <div id='loading-wrap' style='position:fixed; height:100%; width:100%; overflow:hidden; top:0; left:0; display:none'>
        <div id='loading-message'>
            <div class='loader'>
            </div>
            <div class='message'>Loading, please wait</div>
        </div>
    </div>
    <div id="auth">
        <div class="login-wrapper">
            <div class="logo">
                <a href="https://base.vn">
                    <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
                </a>
            </div>

            <div class="welcome">

                <h1>Login</h1>
                <div>Welcome back. Login to start working.</div>
            </div>

            <div class="form">
                <form action="" method="post">
                    <div>
                        <div class="row">
                            <div class="label"> Email </div>
                            <input type="text" name="email" class="text-form" placeholder="Your email">
                        </div>
                        <div class="row">
                            <div class="label"> Password </div>
                            <input type="password" name="password" class="text-form" placeholder="Your password">
                        </div>
                        <div class="row">
                            <div class="checkbox">
                                <input type="checkbox" name="rememberMe"> &nbsp; Keep me logged in
                            </div>
                        </div>
                        <input type="submit" value="Login to start working" class="submit">
                        
                    </div>
                    <div class="oauth">
                        <div class="label">
                            <span>Or, login via single sign-on</span>
                        </div>
                        <a class="oauth-login left">Login with Google</a>
                        <a class="oauth-login left">Login with Microsoft</a>
                        <a class="oauth-login right">Login with SAML</a>
                    </div>

                </form>
            </div>
            <div class="extra xo">
                <a onclick="loadingComponentOnClick();window.location='/register'">No account yet? Register</a>
            </div>
        </div>

    </div>
    </div>
    <div class="right-side">
    </div>
</body>


</html>