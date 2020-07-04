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
                    Current Password:
                    <input type="password" class="password" name="apasswd" 
                            maxlength="100" placeholder="Current Password" 
                                 required>
                    </label>
                </div>
                <div class="elem">
                    <label>
                    New Password:
                    <input type="password" class="password" name="passwd" 
                            maxlength="100" placeholder="New Password" 
                             required>
                    </label>
                </div>
                <div class="elem">
                    <label>
                    Confirm Password:
                        <input type="password" class="password" name="cpasswd" 
                            maxlength="100" placeholder="Confirm Password"
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