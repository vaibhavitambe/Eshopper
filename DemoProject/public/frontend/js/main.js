/*price range*/

$('#sl2').slider();

var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function() {
    $(function() {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });

});

$().ready(function() {
    $("#registerForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                accept: "[a-zA-Z]+"
            },
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
                remote: "/check-email"
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be atleast 2 characters long",
                accept: "Your name must be contain only letters"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be atleast 6 characters long"
            },
            email: {
                required: "Please enter your Email",
                email: "Please enter valid Email",
                remote: "Email already exists"
            }
        }
    });

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your Email",
                email: "Please enter valid Email"
            },
            password: {
                required: "Please enter your password"
            }
        }
    });

    $("#current_pwd").keyup(function() {
        var current_pwd = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
            type: 'get',
            url: '/check-user-pwd',
            data: { current_pwd: current_pwd },
            success: function(resp) {
                if (resp == "false") {
                    $("#chkPwd").html("<font color='red'>Current password is incorrect</font>");
                } else if (resp == "true") {
                    $("#chkPwd").html("<font color='green'>Current password is correct</font>");
                }
            },
            error: function() {
                alert("error");
            }
        });
    });

    $('#copyaddress').on('click', function() {
        if (this.checked) {
            $("#shipping_name").val($("#billing_name").val());
            $("#shipping_address1").val($("#billing_address1").val());
            $("#shipping_address2").val($("#billing_address2").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_pincode").val($("#billing_pincode").val());
        } else {
            $("#shipping_name").val('');
            $("#shipping_address1").val('');
            $("#shipping_address2").val('');
            $("#shipping_city").val('');
            $("#shipping_state").val('');
            $("#shipping_country").val('');
            $("#shipping_pincode").val('');
        }
    });
});



function paymentMethod() {
    if ($("#paypal").is(':checked') || $("#COD").is(':checked')) {

    } else {
        $('#payment').text("Please select the payment method");
        return false;
    }

}