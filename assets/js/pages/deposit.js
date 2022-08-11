/* ------------------------------------------------------------------------------
*
*  # Create Account page
*
* ---------------------------------------------------------------------------- */

$(function() {
	// Style checkboxes and radios
	$('.styled').uniform();

	// Basic select
    $('.bootstrap-select').selectpicker();

});

$(document).ready(function(){

    $("#deposit-form").validate({
		onsubmit: true,
		errorPlacement: function(error, element) {
			error.addClass('help-block text-danger');
			error.insertAfter(element);
		},
		rules: {
			account_number : {
				required: true,
			},
			balance: {
				required: true,
				range: [1, 10000],
			},
		},
		messages : {
			account_number: {
				minlength: "Name should be at least 3 characters",
			},
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});