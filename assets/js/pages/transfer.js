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
	jQuery.validator.addMethod("noteq", function(value, element){
		if ( $("#account_src").val() == $("#account_dst").val() )
			return true;
		else
			return false;
	}, "Select a another account");

    $("#transfer-form").validate({
		onsubmit: true,
		errorPlacement: function(error, element) {
			error.addClass('help-block text-danger');
			error.insertAfter(element);
		},
		rules: {
			account_src : {
				required: true,
			},
			account_dst : {
				required: true,
				noteq: true,
			},
			balance: {
				required: true,
				range: [1, 10000],
				remote: {
					url: 'checkPayment.php',
					type: 'post',
					data: {
						'id': 'transfer',
						'account': $('#account_src').val(),
						'value': $('#balance').val()
					} 
				}
			},
		},
		messages : {
			account_src: {
			},
			account_dst: {
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