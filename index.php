<?php
    session_start();
    $_SESSION["login"] = "aa";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="style/main.css">
    <title>Login into Database</title>
</head>
<body>
<div class="capsole">
        <div id="imageTitle">
            <img src="images/logo.png" style="margin-left:390px; margin-top:5px; border-radius:100px;" width="150" heigth="150" alt="title Logo">
            <h2 style="text-align:center; font-family:arial;font-weight:bold;margin-top:10px;">Welcome to UK - Life Style Gym Information System</h2>
        </div>
        <div id="form">
            <form  action="loginControl.php?month=*" method="get" onsubmit="return validLogin();">
                <fieldset>
                    <legend lang="en" dir="ltr" >Login As</legend>
                    <select name="usertype" id="select-lang">
                        <option value="admin">Admin</option>
                    </select>
                </fieldset>
                <fieldset style="margin-top:25px;">
                    <legend lang="en" dir="ltr">Please Authenticate !</legend>
                    <div class="item">
                        <label for="username ">Username: </label>
                        <input type="text" id="username" name="username" class="input">
                    </div>
                    <div class="item">
                        <label for="password" >Password: </label>
                        <input style="margin-left:52px;" type="password" name="password" id="password" class="input">
                        <span id="u-warning"></span>
                    </div>
                    
                </fieldset>
                <fieldset id="footer" style="border-top:none;">
                    <div style="margin-top:25px;margin-left:80px;margin-bottom:55px;">
                        <span><a href="register.php"><input type="button" value="Signup new members" style="float:left;margin-left:-10px;font-weight:bold;border:2px solid gray;font-size:18px;border-radius:10px;padding:15px;"></a></span>
                        <span><input type="submit" name='login' value="Login into Database" style="font-weight:bold;border:2px solid gray;font-size:18px;border-radius:10px;padding:15px;"></span>
                    
                    </div>
                    <h3 style="margin-left:80px;" id="copyright">Alrights Reserved 2020 by Mohammad Nazir Akbari</h3>
                </fieldset>
                
            </form>
        </div>
    </div>
    <script src="script/script.js"></script>
    
</body>
</html>