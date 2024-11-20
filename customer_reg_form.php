<?php ob_start() ?>

<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/customer_reg_form.css"/>
	<script src="speech-recognition.js"></script>
    
	<?php include'header.php';  ?>
    </head>
    <body>
    <div class="container_regfrm_container_parent">
	<h3>Online Account Opening Form</h3>
	<div class="container_regfrm_container_parent_child">
		<form method="post">
				 <input type="text" id = "name" name="name" placeholder="Name" required />
				 <select name ="gender" required >
					  <option class="default" value="" disabled selected>Gender</option>
					  <option value="Male" required >Male</option>
					  <option value="Female">Female</option>
					  <option value="Others">Others</option>
				</select>
				 <input type="text" name="mobile" placeholder="Mobile no" required />
				 <input type="text" name="email" placeholder="Email id" />
				 <input type="text" name="landline" placeholder="Landline no" />
				 <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" required />
				 <input type="text" name="pan_no" placeholder="PAN Number" required />
				 <input type="text" name="citizenship" placeholder="Citizenship Number" required />
				 <input class="address" type="text" name="homeaddrs" placeholder="Home Address" required  />
				 <input class="address" type="text" name="officeaddrs" placeholder="Office Address" />
				 <input type="text" name="country" placeholder="Country"/>



				 <select name ="state" required >
					  <option class="default" value="" disabled selected>State</option>
					  
					  <option value="Maharashtra">Maharashtra</option>
					  <option value="Rajasthan">Rajasthan</option>
					  <option value="Delhi">Delhi</option>
					  <option value="Himachal Pradesh">Himachal Pradesh</option>
					  <option value="Uttar Pradesh">Uttar Pradesh</option>
					  <option value="West Bengal">West Bengal</option>
					  <option value="J & K">J & K</option>
					  <option value="Uttarakhand">Uttarakhand</option>
					  <option value="Sikkim">Sikkim</option>
					  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
					  <option value="Meghalaya">Meghalaya</option>
					  <option value="Madhya Pradesh">Madhya Pradesh</option>
					  <option value="Karnataka">Karnataka</option>
					  <option value="Tamil Nadu">Tamil Nadu</option>
					  <option value="Kerala">Kerala</option>
					  <option value="Chennai">Chennai</option>

				</select>



				 <select name ="city" required >
					  <option class="default" value="" disabled selected>City</option>
					  <option value="Pune">Pune</option>
					  <option value="Mumbai">Mumbai</option>
					  <option value="Bengaluru">Bengaluru</option>
					  <option value="Ahmedabad">Ahmedabad</option>
					  <option value="Hyderabad">Hyderabad</option>
					  <option value="Chandigarh">Chandigarh</option>
					  <option value="Varanasi">Varanasi</option>
					  <option value="Vadodara">Vadodara</option>
					  <option value="Amritsar">Amritsar</option>
					  <option value="Jaipur">Jaipur</option>
					  <option value="Kolkata">Kolkata</option>
					  <option value="Kanpur">Kanpur</option>
					  <option value="Nagpur">Nagpur</option>
					  <option value="Agra">Agra</option>
					  <option value="Bhopal">Bhopal</option>
					  <option value="Gandhinagar">Gandhinagar</option>
					  <option value="Faridabad">Faridabad</option>
					  <option value="Prayagraj">Prayagraj</option>
					  <option value="Dehradun">Dehradun</option>
					  <option value="Aurangabad">Aurangabad</option>
					  <option value="Coimbatore">Coimbatore</option>
					  <option value="Bhubaneshwar">Bhubaneshwar</option>
					  <option value="Kochi">Kochi</option>
					  <option value="Jabalpur">Jabalpur</option>
					  <option value="Udaipur">Udaipur</option>
					  
				</select>



				 
				 <input type="text" name="pin" placeholder="Pin Code" required />
				 <input type="text" name="arealoc" placeholder="Area/Locality" required />
				 <input type="text" name="nominee_name" placeholder="Nominee Name (If any)" />
				 <input type="text" name="nominee_ac_no" placeholder="Nominee Account no"  />
				 
				 <select name ="acctype" required >
					  <option class="default" value="" disabled selected>Account Type</option>
					  <option value="Saving">Saving</option>
					  <option value="Current">Current</option>
				</select>
				<input type="submit" name="submit" value="Submit">
				<button id="toggleSpeechRecognition" type="button">Toggle Listening</button>
				</form>
         </div>
		 </div>
		 
<?php include'footer.php';?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

  if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
	console.log("speech recognition API supported");
    const speech = {
      enabled: true,
      listening: false,
      recognition: new window.SpeechRecognition(),
      text: ''
    };

    speech.recognition.continuous = true;
    speech.recognition.interimResults = true;
    speech.recognition.lang = 'en-US';

    const toggle = document.getElementById('toggleSpeechRecognition');

    speech.recognition.addEventListener('result', (event) => {
      const audio = event.results[event.results.length - 1];
      speech.text = audio[0].transcript;
	  console.log("Value is : ", speech.text);
      const activeElement = document.activeElement;
      if (activeElement && (activeElement.nodeName === 'INPUT' || activeElement.nodeName === 'TEXTAREA')) {
        if (audio.isFinal) {
          activeElement.value += speech.text;
        }
      }
    });

    toggle.addEventListener('click', () => {
      speech.listening = !speech.listening;
      if (speech.listening) {
        toggle.classList.add('listening');
        toggle.innerText = 'Listening...';
        speech.recognition.start();
      } else {
        toggle.classList.remove('listening');
        toggle.innerText = 'Toggle Listening';
        speech.recognition.stop();
      }
    });
  }
});
</script>    
</body>
</html>


<?php 

if(isset($_POST['submit'])){

	session_start();
	$_SESSION['$cust_acopening'] = TRUE;
	$_SESSION['cust_name']=$_POST['name'];
	$_SESSION['cust_gender']=$_POST['gender'];
	$_SESSION['cust_mobile']=$_POST['mobile'];
	$_SESSION['cust_email']=$_POST['email'];
	$_SESSION['cust_landline']=$_POST['landline'];
	$_SESSION['cust_dob']=$_POST['dob'];
	$_SESSION['cust_pan=']=$_POST['pan_no'];
	$_SESSION['cust_citizenship']=$_POST['citizenship'];
	$_SESSION['cust_homeaddrs']=$_POST['homeaddrs'];
	$_SESSION['cust_officeaddrs']=$_POST['officeaddrs'];
	$_SESSION['cust_country']=$_POST['country'];
	$_SESSION['cust_state']=$_POST['state'];
	$_SESSION['cust_city']=$_POST['city'];
	$_SESSION['cust_pin']=$_POST['pin'];
	$_SESSION['arealoc']=$_POST['arealoc'];
	$_SESSION['nominee_name']=$_POST['nominee_name'];
	$_SESSION['nominee_ac_no']=$_POST['nominee_ac_no'];
	$_SESSION['cust_acctype']=$_POST['acctype'];
	
	header('location:cust_regfrm_confirm.php');
	
	
}

?>