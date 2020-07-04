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
                    First Name:
                    <input type="text" class="name" name="fName" 
                            maxlength="100" placeholder="First Name" 
                                value="<?= $_COOKIE['user_fName'];?>" required>
                    </label>
                </div>
                <div class="elem">
                    <label>
                    Last Name:
                        <input type="text" class="name" name="lName" 
                            maxlength="100" placeholder="Last Name"
                            value="<?= $_COOKIE['user_lName'];?>" required>
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