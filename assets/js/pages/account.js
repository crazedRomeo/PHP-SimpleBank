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

	$("#account_reload").click(function() {
		$.ajax({
			url: 'checkAccount.php',
			dataType: 'json',
			type: 'post',
			data: { id : "account_reload" },
			success: function( data ){
				$('#account_number').val( data.account_number );
			},
		});
	});
});

$(document).ready(function(){

    $("#account-form").validate({
		onsubmit: true,
		errorPlacement: function(error, element) {
			error.addClass('help-block text-danger');
			error.insertAfter(element);
		},
		rules: {
			account_number : {
				required: true,
				minlength: 12,
				remote: {
					url: 'checkAccount.php',
					type: 'post',
					data: {
						'id': 'account_number',
						'value': $('#account_number').val()
					} 
				}
			},
			account_type: {
				required: true,
			},
			balance: {
				required: true,
				range: [5, 10000],
			},
		},
		messages : {
			account_number: {
				minlength: "Name should be at least 3 characters",
				remote: "This Account Number is already taken"
			},
		},
		submitHandler: function (form) {
			form.submit();
			return false; // prevent normal form posting
		}
	});
});