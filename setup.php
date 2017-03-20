<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<link rel='stylesheet' href='css/font-awesome.min.css'>
		<link rel='stylesheet' href='css/animate.css'>
		
		<style>
			input{
				color: #fafafa; !important
			}
			.col-lg-12{
				padding: 0px;
			}
			.input{
				padding-top: 5px;
				padding-bottom: 5px;
			}
			.info{
				padding-left: 100px;
				padding-right: 100px;
				
			}
			.header{
				padding-top: 30px;
				padding-left: 100px;
				padding-bottom: 30px;
			}
			#titlebar{
				height: 150px;
				width: 100%;
				background-color: #313541;
			}
			#cname{
				color: #fafafa;
				margin: 0px;
				padding-top: 35px;
				padding-left: 100px;
			}
			#title{
				color: white;
				margin: 0px;
				padding-top: 50px;
				padding-left: 100px;
			}
		</style>
	</head>
	<body>
		<div class='container-fluid'>
			<div class='row'>
				<div class='col-lg-12'>
					<div id='titlebar'>
						<h5 id='cname'>S U N V I E W &nbsp R E S I D E N C E S &nbsp A N D &nbsp C O M E R C I A L &nbsp S P A C E S</h5>
						<h3 id='title'>I N I T I A L &nbsp S E T U P</h3>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-lg-12'>
					<form method='POST' action='admin_setup.php'>
						<div class='col-lg-5 col-lg-offset-1'>
							<h4 class='header'>Let's change your LOGIN CREDENTIALS</h4>
							<div class='info'>	
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='username' placeholder='Username'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
										<input type='password' class='form-control' name='password' placeholder='Password'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
										<input type='password' class='form-control' name='password2' placeholder='Confirm Password'>
									</div>
								</div>
							</div>
						</div>
						<div class='col-lg-5'>
							<h4 class='header'>Let's change your PERSONAL INFORMATION</h4>
							<div class='info'>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='lname' placeholder='Last Name'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='fname' placeholder='First Name'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='mname' placeholder='Middle Name'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='address' placeholder='Address'>
									</div>
								</div>
								<div class='form-group input'>
									<div class='input-group'>
										<div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<input type='text' class='form-control' name='contact' placeholder='Contact Number'>
									</div>
								</div>
								<button type='submit' class='pull-right btn btn-success'>Submit <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<script src='js/jquery-3.1.1.min.js'></script>
<script src='js/wow.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
	
</script>