/* ------------------------------------------------------------------------------
*
*  # Create Account page
*
* ---------------------------------------------------------------------------- */

$(function() {
	// Style checkboxes and radios
	$('.styled').uniform();

	// Select with search
    $('.select-search').select2();

	$('#account_number').on('change', function(){
		if ( $("#account_number").val() > 0 ) {
			$("#account_num").val($("#account_number").val());
			console.log($("#account_num").val());
			$.ajax({
				url: 'checkPayment.php',
				dataType: 'json',
				type: 'post',
				data: { id : "get_balance", account: $("#account_number").val() },
				success: function( data ){
					$('#account_balance').val( data.balance );
				},
			});
		} else {
			$('#account_balance').val( "" );
		}
	});
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
				min: 1,
			},
			balance: {
				required: true,
				range: [1, 10000],
				remote: {
					url: 'checkPayment.php',
					type: 'post',
					data: {
						id: 'withdraw',
						account: $("#account_num").val(),
						value: $('#balance').val(),
					} 
				}
			},
		},
		messages : {
			account_number: {
				min: "Please select an Account Number.",
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