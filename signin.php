<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
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
                    <a class="headlink" href="index.html"> Register </a>
                </div>
            </div>
            <div id="container"> 
                <div id="emaillogin">
                    <div id="logintitle"> 
                        Sign In
                    </div>
                    <div id="register">
                        <!-- This is a form for register a new accont -->
                        <form method="POST" name="inputform" action="">
                            <!-- Email Address -->
                            <div>
                                <input type="text" id="email" class="rinput" placeholder="Email Address"/>
                            </div>
                            <!-- Password -->
                            <div>
                                <input type="password" id="password" class="rinput" placeholder="Password"/>
                            </div>
                            <div id="butt">
                                <input type="submit" class="createacc" value="Log In"/>
                            </div>
                        </form>
                    </div>
                    <div class="forgot"><a href=""> Forgot password?</a> </div>
                </div>
                <div id="centerline">
                    <div id="tline"> 
                    </div>
                    <div> <p class="ord">or</p> </div>
                    <div id="bline">
                    </div>
                </div>
                <div class="rightpanel"> 
                    <input type="text"/>
                </div>
            </div>
        </div>
        <div id="second"> 

        </div>
    </body>
</html>