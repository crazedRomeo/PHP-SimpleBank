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

    $("#withdraw-form").validate({
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
				remote: {
					url: 'checkPayment.php',
					type: 'post',
					data: {
						'id': 'withdraw',
						'account': $('#account_number').val(),
						'value': $('#balance').val()
					} 
				}
			},
		},
		messages : {
			account_number: {
				minlength: "Name should be at least 3 characters",
			},
			balance: {
				remote: "Can not withdraw more than the balance in your account."
			}
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});