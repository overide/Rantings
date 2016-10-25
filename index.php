

<html>
<head>
        <title>Diary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/desktop.css" type="text/css">
        <link rel="stylesheet" href="css/signin.css" type="text/css">
        <link rel="stylesheet" href="css/signup.css" type="text/css">
        <script src="jquery/jquery-2.1.4.min.js"></script>
        <script src="js/popup.js"></script>
    </head>
    <body>
        <div id="container">
                <div id="top"><p>RANTINGS</p></div>
                <div id="top2">"There is no greater agony than bearing an untold story inside you,<br>
        			  write to taste life twice,in the moment and in retrospect"
                </div>
                <div id="menu">
                    <a id="pop1"><button class="ghostb" id="su" type="button">SIGNIN</button></a>
                    <div id="overlay1">
                            <div class="container1">
                                <?php include 'scripts/signincore.php'; ?>
                                    
                                   
                                    <a id="popupcloseIcon1"><img src="images/icons/close.png" width=30 height=30></a>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <h2 class="form-signin-heading" align="center">Member Signin</h2>
                                    
                                        <input  class="fields" id="uname" name="usermail"  type="email" placeholder="E-mail"  autofocus>
                                        <br>
                                        <input  class="fields" id="upass"name="userpass"  type="password" placeholder="Password" >
                                        <br>
                                        <button  id="signin" name="submit1" type="submit">Sign in</button><br>
                                        <a class="lostpass" href="lostpass.php">Lost your password?</a>
                                        <p style="color:#1ABC9C;font-size:13px; text-align:center;display:block;"><?php echo $em1.$em2;?></p>
                                    </form>
                            </div>
                    </div>
                    <a id="pop2"><button class="ghostb" id="li" type="button">SIGNUP</button></a>
                    <div id="overlay2">
                            <div class="container2">
                                <?php include 'scripts/signupcore.php'; ?>
                                    
                                   
                                    <a id="popupcloseIcon2"><img src="images/icons/close.png" width=30 height=30></a>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <h2 class="form-signin-heading" align="center">Member Signup</h2>
                                    
                                        <input  class="fields" id="ufname" name="userfname"  type="text" placeholder="First Name"  autofocus>
                                        <br>
                                        <input  class="fields" id="ulname"name="userlname"  type="text" placeholder="Last Name" >
                                        <br>
                                        <input  class="fields" id="uemail" name="useremail"  type="email" placeholder="E-mail" >
                                        <br>
                                        <input  class="fields" id="upass"name="userpassword"  type="password" placeholder="Password" >
                                        <br>
                                         <input  class="fields" id="upass"name="userrepassword"  type="password" placeholder="Reconfirm Password" >
                                        <br>
                                        <button  id="signup" name="submit2" type="submit">Create Account</button><br>
                                        <p style="color:#1ABC9C;font-size:13px; text-align:center;display:block;"><?php echo $ms1.$ms2.$ms3; ?></p>
                                    </form>
                            </div>
                    </div>
                 </div>
            </div>
    </body>
</html>
