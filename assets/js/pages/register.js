/* ------------------------------------------------------------------------------
*
*  # Login page
*
* ---------------------------------------------------------------------------- */

$(function() {
	// Style checkboxes and radios
	$('.styled').uniform();
});

$(document).ready(function(){

    $("#register-form").validate({
		onsubmit: true,
		errorPlacement: function(error, element) {
			error.addClass('help-block text-danger');
			error.insertAfter(element);
		},
		rules: {
			username : {
				required: true,
				minlength: 3,
				remote: {
					url: 'checkUnique.php',
					type: 'post',
					data: {
						'id': 'username',
						'value': $('#username').val()
					} 
				}
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: 'checkUnique.php',
					type: 'post',
					data: {
						'id': 'email',
						'value': $('#email').val()
					}
				}
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password",
			},
		},
		messages : {
			username: {
				minlength: "Name should be at least 3 characters",
				remote: "This username is already taken"
			},
			email: {
				email: "The email should be in the format: abc@domain.tld",
				remote: "This email is already taken"
			},
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});