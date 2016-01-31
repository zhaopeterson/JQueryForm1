$(function(){
	$("#regform").submit(function(){
			$("div.error").remove();
		var abort = false;
		$(":input[required]").each(function(){

			if($(this).val() === '') {
				$(this).after ("<div class='error'> This is the required field</div>");
				abort = true;
			}
		}); // go through each field
		if (abort) { return false;} else {
			postData = $('#regform').serialize();
			console.log(postData)
			$.post('formprocess.php', postData+'&action=submit&ajaxrequest=1', function(msg){
				if (msg) {
					$('#regform').before(msg);
				}
			});
			return false;
		}
	})
});// ready

$("input[required]").blur(function(){
	$("div.error").remove();
	var inputPattern = $(this).attr("pattern");
	var inputPlaceholder = $(this).attr("placeholder");
	var isValid = $(this).val().search(inputPattern) >= 0;
	if(!isValid) {
		$(this).focus();
		$(this).after("<div class='error'>Entry does not match expected pattern: " + inputPlaceholder + "</div>");
	} // is valid test
}) // onblur