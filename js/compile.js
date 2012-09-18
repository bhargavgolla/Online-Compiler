//javascript

$(document).ready(function() {
	$('#form #submit').click(function() {
		// Fade in the progress bar
		$('#output').hide();
		$('#output').html('<br/>Generating the output &nbsp;&nbsp;&nbsp; <img src="../images/loader.gif" />');
		$('#output').fadeIn();
		// Disable the submit button
		$('#form #submit').attr("disabled", "disabled");
		// Clear and hide any error messages
		$('#form .error').html('');
		// Set temporary variables for the script
		var isFocus=0;
		var isError=0;
		// Get the data from the form
		var code=$('#form #code').val();
		var input=$('#form #input').val();
		var language=$('#form #language').val();
		// Validate the data
		if($.trim(code)=='') {
			$('#form #errorCode').html('The code area is empty');
			$('#form #code').focus();
			isFocus=1;
			isError=1;
		}
		// Terminate the script if an error is found
		if(isError==1) {
			$('#output').html('');
			$('#output').hide();
			// Activate the submit button
			$('#form #submit').removeAttr("disabled", "disabled");
			return false;
		}
		$.ajaxSetup ({
			cache: false
		});
		var dataString = 'code='+ encodeURIComponent(code) + '&input=' + encodeURIComponent(input) + '&language=' + encodeURIComponent(language);
		$.ajax({
			type: "POST",
			url: "compile.php",
			data: dataString,
			success: function(msg) {
				$('#output').html(msg);
				$('#form #submit').removeAttr("disabled", "disabled");
			},
			error: function(ob,errStr) {
				$('#output').html('');
				// Activate the submit button
				$('#form #submit').removeAttr("disabled", "disabled");
			}
		});
		return false;
	});
});
