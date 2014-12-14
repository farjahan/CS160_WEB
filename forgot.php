
<!DOCTYPE HTML5> 
<html>
    <head> 
        <link rel="stylesheet" type="text/css" href="style/reset.css">
        <link rel="stylesheet" type="text/css" href="style/mystyle.css">  
    </head> 
    <body> 
        <h1>Reset Your Password</h1>
        <form action="" method="POST" id="forgotform">
            <label for="forgotemail">Email: </label> 
            <input type="email" class="rinput" name="forgotemail" id="forgotemail" required> <br/><br/>
            <input type="submit" id="submit" name="submit" class="forgotbutton" value="Reset Password"> 
        </form> 
        <a href="signin.php">Sign In </a> 
        <div class="warning"> </div> 

        <script type="text/javascript" src="script/jquery2.1.1.js" ></script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $("#forgotform").submit(function (event) {
                    event.preventDefault();
                    var cemail = $("#forgotemail").val();
                    $.ajax({
                        type: "POST",
                        url: "resetpass.php",
                        dataType: "text",
                        data: {email: cemail},
                        success: function (data) {

                            $(".warning").html(data);
                        }
                    });
                });
            });
        </script>
    </body> 
</html> 
