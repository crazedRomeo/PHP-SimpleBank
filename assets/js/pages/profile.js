/* ------------------------------------------------------------------------------
*
*  # User Profile page
*
* ---------------------------------------------------------------------------- */

$(function() {
	// Style checkboxes and radios
	$('.styled').uniform();

	// Basic select
    $('.bootstrap-select').selectpicker();
});

$(document).ready(function(){

    $("#profile-form").validate({
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
					url: 'checkProfile.php',
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
					url: 'checkProfile.php',
					type: 'post',
					data: {
						'id': 'email',
						'value': $('#email').val()
					}
				}
			},
			password: {
				required: true,
				minlength: 5,
				remote: {
					url: 'checkProfile.php',
					type: 'post',
					data: {
						'id': 'password',
					}
				}
			},
			new_password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#new_password",
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
			password: {
				remote: "The current password is incorrect."
			},
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});