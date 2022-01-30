<?php
include('header.php');
?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-3">
			<div class="card">
				<div class="card-header">SIGN IN</div>
				<div class="card-body">
					<form id="patient_login_form">
						<div class="form-group">
							<label>Patient Email Address</label>
							<input type="text" name="Patient_email_address" id="Patient_email_address" class="Form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div> 
						<div class="form-group">
							<label>Patient Password</label>
							<input type="Password" name="Patient_Password" id="Patient_Password" class="Form-control" required data-parsley-trigger="keyup" />
						</div>
						<div class="form-group text-center">
							<input type="Submit" name="patient_login_button" id="patient_login_button" class="btn btn-primary" value="Login"/>
						</div>
						<div class="form-group text-center">
							<p><a href="registration.php">SIGN UP</a></p>
						</div>	
					</form>
				</div>		
			</div>	
		</div>
	</div>
</div>