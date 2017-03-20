<?php
	if (isset($_POST['username']) && isset($_POST['password'])) {
		session_start();
		$status = '';
		require('sql_connect.php');
		
		$username = $_POST['username'];
		$password = hash('sha256', $_POST['password']);
		
		$query = "SELECT password, salt FROM users WHERE username='{$username}'";
		$result = mysqli_query($conn, $query);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$hashedPass = hash('sha256', $password . $row['salt']);
				echo $hashedPass;
				if (strcasecmp($hashedPass, $row['password']) == 0) {
					$status = 'success';
					header('location: home.php');
				} else {
					$status = 'wrongpass';
				}
			} else {
				$status = 'notfound';
			}
		} else {
			$status = 'error';
			// echo mysqli_error($conn);
		}
	}
?>
<html>
<head>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='css/font-awesome.min.css'>
	<link rel='stylesheet' href='css/animate.css'>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-offset-4 col-md-4'>
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form method='POST' action='login.php'>
							<div class='form-group'>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
									<input type='text' name='username' class='form-control' placeholder='Username'>
								</div>
							</div>
							<div class='form-group'>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
									<input type='text' name='password' class='form-control' placeholder='Password'>
								</div>
							</div>
							<button type='submit' class='pull-right btn btn-success'>Login <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src='js/jquery-3.1.1.min.js'></script>
<script src='js/wow.min.js'></script>
<script>
	new WOW().init();
</script>
<script src='js/bootstrap.min.js'></script>