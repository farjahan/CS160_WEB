$(document).ready(function () {
    $("#registerform").submit(function (event) {
        event.preventDefault();
        var p1 = $("#password").val();
        var p2 = $("#cpassword").val();
        if (p1 != p2)
        {
            event.preventDefault();
            $(".passwarning").html("Password Mismatch");
            $(".passwarning").css("color", "red");
            $("#password").css("border", "1px solid RED");
            $("#cpassword").css("border", "1px solid RED");
        } else {
            var password = $("#password").val();
        }
        var newemail = $("#email").val();
        var firstname = $("#fname").val();
        var lastname = $("#lname").val();

        if (newemail != '')
        {
            $.ajax({
                type: "POST",
                url: "existingemail.php",
                dataType: "text",
                data: {cemail: newemail, fname: firstname, lname: lastname, pass: password},
                success: function (data) {
                    if ($.trim(data) == "success") {
                        window.location.href = "emailcheck.php";
                    } else {
                        $(".emailwarning").html(data);
                    }
                }
            });
        }

    });
    $("input").focus(function () {
        $(this).css("border", "1px solid #c0c8c9");
    });
    $("#password").focus(function () {
        $(this).css("border", "1px solid #c0c8c9");
        $(".passwarning").html("");
    });
    $("#cpassword").focus(function () {
        $(this).css("border", "1px solid #c0c8c9");
        $(".passwarning").html("");
    });

    $("#maintable").DataTable();
    $(".dateinput").datepicker({ 
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
      changeYear: true,
              showButtonPanel: true
    });

});