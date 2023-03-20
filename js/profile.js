
         const myObjString = localStorage.getItem('myObj');
        const myObj = JSON.parse(myObjString);
      let obj= {
          'email':myObj.email,
         'pswd':myObj.pswd,
          }
          document.getElementById('mailid').innerHTML=myObj.email;
         $.ajax({
         type: 'POST',
         url: 'php/profile.php',
          data :obj,
    			success: function(data) {
                     const res=JSON.parse(data);
                       document.getElementById('username').value=res.name;
                       document.getElementById('dob').value=res.dob;
                       document.getElementById('age').value=res.age;
                       document.getElementById('bio').value=res.bio;
                       document.getElementById('phno').value=res.phno;
                       document.getElementById('address').value=res.address;
    			},
    			error: function(jqXHR, textStatus, errorThrown) {
    				alert(textStatus, errorThrown);
    			}
    		});

$(document).ready(function() {

   
    $("#update_profile").click(function(event) {
      event.preventDefault(); 
      $("input, textarea").prop("disabled", false); 
      $(this).hide(); 
      $("#save_profile").show(); 
    });
  
   
    $("#save_profile").click(function(event) {
      event.preventDefault(); 
      $("input, textarea").prop("disabled", true); 
      $(this).hide(); 
      $("#update_profile").show(); 
  
      $.ajax({
        url: "php/update_profile.php",
        type: "POST",
        data: {
            'email' :myObj.email,
            'name' :document.getElementById('username').value,
            'age':document.getElementById('age').value,
            'dob':document.getElementById('dob').value,
            'address':document.getElementById('address').value,
            'bio':document.getElementById('bio').value,
            'phno':document.getElementById('phno').value,
        }, 
         
        
        success: function(response) {
            alert("Successfully updated");
          const res=JSON.parse(response);
          document.getElementById('username').value=res.name;
          document.getElementById('dob').value=res.dob;
          document.getElementById('age').value=res.age;
          document.getElementById('bio').value=res.bio;
          document.getElementById('phno').value=res.phno;
          document.getElementById('address').value=res.address;
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error(jqXHR, textStatus, errorThrown); 
          alert("Failed to update profile. Please try again later.");
        }
      });
    });
  
  });
  
