 function Login(e){
	   
        e.preventDefault();
		var formData = $('#login-form').serialize();
		//console.log(formData)
		$.ajax({
			type: 'POST',
			url: 'php/login.php',
			data: formData,
			success: function(data) {
                if(data == "Your Profile")
                {
					const myObj = { email:document.getElementById('email').value , pswd: document.getElementById('pswd').value };
                    localStorage.setItem('myObj', JSON.stringify(myObj));
					//localStorage.setItem('email',document.getElementById('email').value);
                     // alert(document.getElementById('email').value);
					 //console.log(localStorage);
					window.location.href = "profile.html";
                }
                else{
					$('#status').html(data);
                   // window.location.href = "login.html";
                }
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(textStatus, errorThrown);
			}
		});
 }