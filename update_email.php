<!doctype html>
<html lang="en">
<head>
    <!-- <link rel="icon" href="img/favicon.png" type="image/ico"> --> <!-- favicon -->
	<link href="styles/style_account.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <!-- <title>Fashion E-Shop</title> -->
</head>
<body style="margin: 0;">  
    <div class="textbox">
        <form method="post">
            <div class="elems">
                <div class="elem">
                    <label>
                    Current E-mail:
                    <div class="mail">
                        <?= $_COOKIE['user_email'] ?>
                    </div>
                    </label>
                </div>
                <div class="elem">
                    <label>
                    New E-mail:
                        <input type="email" class="email" name="email" 
                            maxlength="100" placeholder="New E-mail"
                             required>
                    </label>
                </div>
            </div>
            <div>
                <button class="update_button" name="update">Update</button>
            </div>
        </form>
    </div>
</body>
</html>