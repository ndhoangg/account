<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password - Base Account</title>
    <link rel="stylesheet" type="text/css" href="./css/recover.css">
</head>

<body>
    <div id="auth">
        <div class="register-wrapper">
            <div class="logo">
                <a href="https://base.vn">
                    <img src="https://share-gcdn.basecdn.net/brand/logo.full.png">
                </a>
            </div>

            <div class="welcome">

                <h1>Recover Password</h1>
                <div>Please enter your information. A password recovery hint will be sent to your email.</div>
            </div>

            <div class="form">
                <form action="" method="post">
                    <div>
                        <div class="row">
                            <div class="label"> Email </div>
                            <input type="text" name="email" class="text-form" placeholder="Your email">
                        </div>
                        <input type="submit" value="Recover Password" class="submit">
                    </div>
                </form>

                <?php include_once "./handler/RecoverPasswordHandler.php" ?>
            </div>
        </div>
    </div>
    <div class="right-side">
    </div>
</body>

</html>