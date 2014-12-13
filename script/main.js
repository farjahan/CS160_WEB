$(document).ready(function () {
    $("#registerform").submit(function (event) {
        var p1 = $("#password").val();
        var p2 = $("#cpassword").val();
        if (p1 != p2)
        {
            event.preventDefault();
            $(".passwarning").html("Password Mismatch");
            $(".passwarning").css("color", "red");
            $("#password").css("border", "1px solid RED");
            $("#cpassword").css("border", "1px solid RED");
        }
        if ($("#email").val())
        {
            $newemail = $("#email").val();
            $.ajax({
                type:"POST",
                url:"existingemail.php",
                data: { email:p1 }, success:function(data) {
                    $(".emailwarning").html(data);
                }
            });
        }
        if(empty($("#fname").val()))
        {
            $("#fname").css("border", "1px solid RED");
        }
        if(empty($("#lname").val()))
        {
            $("#lname").css("border", "1px solid RED");
        }
        if(empty($("#email").val()))
        {
            $("#email").css("border", "1px solid RED");
        }
        if(empty($("#password").val()))
        {
            $("#password")
        }
        
    });

    $("#maintable").DataTable();
    $(".dateinput").datepicker();
});