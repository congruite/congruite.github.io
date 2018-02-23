$(document).ready(function() {
	var frm=$("#myForm");
	
	frm.submit(function(e) {
		$("#submitBtn").val("SENDING...");
		$("#submitBtn").prop("disabled",true);
		console.log("Submit called");
		var frm = $("#myForm");
		// process the form
		$.ajax({
			type : 'POST', // define the type of HTTP verb we want to use (POST
							// for our form)
			url : 'sendMail.php', // the url where we want to POST
			data : frm.serialize(),
			success : function() {
				$.growl({ title:"Thank you for contacting us. We'll be in touch soon!", message: '',priority:'success'});
				frm.trigger("reset");
				$("#submitBtn").val("SEND");
				$("#submitBtn").prop("disabled",false);
			},
			error : function() {
				$.growl({ title:'Sorry, there was a problem with your message. Please try again.', message: '',priority:'danger'});
				$("#submitBtn").val("SEND");
				$("#submitBtn").prop("disabled",false);
			}
		})
		e.preventDefault();
		
	});
});

function warn(msg) {
	$.bootstrapGrowl(msg, {
		type : 'warning',
		align : 'right',
		width : 'auto',
		allow_dismiss : true
	});
}
function formValidate() {
	
	return false;
}
