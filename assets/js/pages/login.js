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

    $("#login-form").validate({
		onsubmit: true,
		errorPlacement: function(error, element) {
			error.addClass('help-block text-danger');
			error.insertAfter(element);
		},
		rules: {
			username : {
				required: true,
				minlength: 3,
			},
			password: {
				required: true,
				minlength: 5
			},
		},
		messages : {
			username: {
				minlength: "Name should be at least 3 characters",
			},
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});