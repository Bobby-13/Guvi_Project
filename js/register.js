

	function Validate(e) {
		e.preventDefault();
		var formData = $('#register-form').serialize();
		//console.log(formData)
		$.ajax({
			type: 'POST',
			url: 'php/register.php',
			data: formData,
			success: function(data) {
				if(data == "registered successfully!")
				{
					$('#status').html(data);
				//	window.location.href = "login.html";
				}
				//alert(data);
				$('#status').html(data);
				//window.location.href = "register.html";
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus, errorThrown);
			}
		});
	};
