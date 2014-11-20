<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="style/reset.css">
        <link rel="stylesheet" type="text/css" href="style/mystyle.css">

    </head>
    <body>
        <div id="outter"> 
            <div id="top">
                <div id="leftheader">
                    <a class="headlink" href="">PVault</a>
                </div>
                <div id="secondleftheader">
                    <a class="headlink" href="">Main</a>
                </div>
                <div id="rightheader">
                    <a class="headlink" href="signin.html"> Sign In </a>
                </div>
            </div>
            <div id="container"> 
                <div id="emaillogin">
                    <div id="logintitle"> 
                        Create you account
                    </div>
                    <div id="register">
                        <!-- This is a form for register a new accont -->
                        <form method="POST" name="inputform" action="">
                            <!-- First Name -->
                            <div>
                                <input type="text" id="fname" class="rinput" placeholder="First Name"/>
                                <!-- Last Name -->
                                <input type="text" id="lname" class="rinput" placeholder="Last Name"/>
                            </div>
                            <!-- Email Address -->
                            <div>
                                <input type="text" id="email" class="rinput" placeholder="Email Address"/>
                            </div>
                            <!-- Password -->
                            <div>
                                <input type="password" id="password" class="rinput" placeholder="Password"/>
                            </div>
                            <!-- Comfirm Password -->
                            <div>
                                <input type="password" id="cpassword" class="rinput" placeholder="Re-enter Password"/>
                            </div>
                            <div> 
                                <input type="pin" id="pin" class="rinput" placeholder="4 Digit PIN number" maxlength="4"/>
                            </div>
                            <!-- Create new account button -->
                            <div id="butt">
                                <input type="submit" class="createacc" value="Create Account"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="centerline">
                    <div id="tline"> 
                    </div>
                    <div class="ord"> <p class="ord">or</p> </div>
                    <div id="bline">
                    </div>
                </div>
            </div>
        </div>
        <div id="second"> 

        </div>
    </body>
</html>