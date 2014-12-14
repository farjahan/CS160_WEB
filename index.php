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
                    <a class="headlink" href="index.php">PVault</a>
                </div>
                <div id="secondleftheader">
                    <a class="headlink" href="index.php">Main</a>
                </div>
                <div id="rightheader">
                    <a class="headlink" href="signin.php"> Sign In </a>
                </div>
            </div>
            <div id="container"> 
                <div id="emaillogin">
                    <div id="logintitle"> 
                        Create you account
                    </div>
                    <div id="register">
                        <div class=""
                        <!-- This is a form for register a new account -->
                        <form method="POST" id="registerform" name="inputform" action="/" >
                            <!-- First Name -->
                            <div>
                                <input type="text" name="fname" id="fname" class="rinput" placeholder="First Name" required/>
                                <!-- Last Name -->
                                <input type="text" name="lname" id="lname" class="rinput" placeholder="Last Name" required/>
                            </div>
                            <!-- Email Address -->
                            <div>
                                <input type="email" name="email" id="email" class="rinput" placeholder="Email Address" required/>
                            </div>
                            <!-- Password -->
                            <div>
                                <input type="password" name="password" id="password" class="rinput" placeholder="Password" required/>
                            </div>
                            <!-- Confirm Password -->
                            <div>
                                <input type="password" name="cpassword" id="cpassword" class="rinput" placeholder="Re-enter Password" required/>
                            </div>
                            <div> 
                                <p class="passwarning" style="color: RED;"></p>
                                <p class="emailwarning" style="color: RED;"></p>
                            </div> 
                         
                            <div id="butt">
                                <input type="submit" name="submit" class="createacc" value="Create Account"/>
                            </div>
                        </form>
                        <div class="forgot"><a href="forgot.php"> Forgot password?</a> </div>
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
            
            
    <!--Javascript Placed at the buttom to make it load faster-->
     <script type="text/javascript" src="script/jquery2.1.1.js" ></script> 
     <script type="text/javascript" src="script/main.js"></script>
    </body>
</html>