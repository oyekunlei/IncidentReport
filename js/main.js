/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#login-btn").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        $("input").removeClass("fix");
        $(".error").fadeOut();

        if (!username.match(/^['a-zA-Z- ]+$/))
        {
            $("#username").addClass("fix");
            $("#username_error").fadeIn();
            return false;
        } else if (password === "")
        {
            $("#password").addClass("fix");
            $("#password_error").fadeIn();
            return false;
        } else {
            $("#username").removeClass("fix");
            $("#username_error").fadeOut();
            $("#password").removeClass("fix");
            $("#password_error").fadeOut();
            return true;
        }
    });

    $("#add-user-btn").click(function () {
        var name = $("#name").val();
        var surname = $("#surname").val();
        var location = $("#location").val();
        var image = $("#image").val();

        $("input").removeClass("fix");
        $(".error").fadeOut();

        if (!name.match(/^['a-zA-Z- ]+$/))
        {
            $("#name").addClass("fix");
            $("#name_error").fadeIn();
            return false;
        } else if (!surname.match(/^['a-zA-Z- ]+$/))
        {
            $("#surname").addClass("fix");
            $("#surname_error").fadeIn();
            return false;
        } else if (!location.match(/^['a-zA-Z- ]+$/))
        {
            $("#location").addClass("fix");
            $("#location_error").fadeIn();
            return false;
        } else if (image === "")
        {
            $("#image").addClass("fix");
            $("#image_error").fadeIn();
            return false;
        } else if (image !== "")
        {
            var extension = image.replace(/^.*\./, '');
            if (extension !== 'jpg' && extension !== 'jpeg' && extension !== 'png')
            {
                $("#image").addClass("fix");
                $("#image_error").fadeIn();
                return false;
            } else
            {
                return true;
            }
        } else
        {
            $("#name").removeClass("fix");
            $("#name_error").fadeOut();
            $("#surname").removeClass("fix");
            $("#surname_error").fadeOut();
            $("#location").removeClass("fix");
            $("#location_error").fadeOut();
            $("#image").removeClass("fix");
            $("#image_error").fadeOut();
            return true;
        }
    });

    $('#changeStatus').change(function () {
        var status = $('#changeStatus').val();
        var id = $('#issue_id').val();
        $.post('src/changeStatus.php', {
            status: status,
            id: id,
        }, function (responseText) {
            $('.alert').text("Status Changed");
        });
    });
});
