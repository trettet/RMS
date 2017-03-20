<?php
	session_start();
	require("sql_connect.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<link rel='stylesheet' href='css/font-awesome.min.css'>
		<link rel='stylesheet' href='css/animate.css'>
	</head>
	<body>
		<div class='container-fluid'>
			<!--STUFF INSIDE THE PAGE-->
			<div class='container-fluid'>
				<button type='button' class='btn btn-success' data-toggle="modal" data-target="#add_building">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> ADD BUILDING 
				</button>
				<button type='button' class='btn btn-success' data-toggle="modal" data-target="#add_room">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ROOM 
				</button>
				<button type='button' class='btn btn-success' data-toggle="modal" data-target="#add_dp">
					<i class="fa fa-plus-circle" aria-hidden="true"></i> ADD DESK PERSON 
				</button>
			</div>
			
			<!--MODALS TO BE CALLED-->	
			<!--ADD BUILDING MODAL-->
			<div id="add_building" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">ADD BUILDING</h4>
						</div>
						<div class="modal-body">
							<form method='POST' action='add_building.php'>
								<label>Building</label>
								<input name="building_name" type="text" class="form-control" required>
								
								<label>Address</label>
								<input name="address" type="text" class="form-control" required>
								
								<label>Contact Number</label>
								<input name="contact_no" type="text" class="form-control" required>
								
								<div class="form-group">
									<label>Desk Person</label>
									<select class="form-control" name="desk_person">
										<?php
											$query = "SELECT desk_person_id FROM users";
											$fetch = mysqli_query($conn, $query);
											
											if($fetch->num_rows > 0){
												while($dp = $fetch->fetch_assoc()){
													echo "<options>{$dp["desk_person_id"]}</option>";
												}
											}
										?>
									</select>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">
										<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Building
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--ADD ROOM MODAL-->
			<div id="add_room" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">ADD ROOM</h4>
						</div>
						<div class="modal-body">
							<form method='POST' action='add_room.php'>
								<div class="form-group">
									<label>Building</label>
									<select class="form-control" name="building_id">
										<?php
											$query = "SELECT building_id FROM buildings";
											$fetch = mysqli_query($conn, $query);
											
											if($fetch->num_rows > 0){
												while($bid = $fetch->fetch_assoc()){
													echo "<options>{$bid["building_id"]}</option>";
												}
											}
										?>
									</select>
								</div>
								
								<label>Unit Cost</label>
								<input name="unit_cost" type="text" class="form-control" required>
								
								<label>Floor</label>
								<input name="floor" type="text" class="form-control" required>
								
								<label>Area Size</label>
								<input name="area_size" type="text" class="form-control" required>
								
								<div class="form-group">
								  <label>Rental Type</label>
								  <select class="form-control" name="rental_type">
									<option>COMERCIAL</option>
									<option>PERSONAL</option>
									<option>STUDIO</option>
								  </select>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">
										<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Room
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--ADD DESK PERSON MODAL-->
			<div id="add_dp" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">ADD DESK PERSON</h4>
						</div>
						<div class="modal-body">
							<form method='POST' action='add_dp.php'>
								<label>Username</label>
								<input name="username" type="text" class="form-control" required>
								
								<label>Password</label>
								<input name="password" type="password" class="form-control" required>
								
								<label>Confirm Password</label>
								<input name="password2" type="password" class="form-control" required>
								
								<label>Last Name</label>
								<input name="lname" type="text" class="form-control" required>
								
								<label>First Name</label>
								<input name="fname" type="text" class="form-control" required>
								
								<label>Middle Name</label>
								<input name="mname" type="password" class="form-control" required>
								
								<label>Address</label>
								<input name="address" type="password" class="form-control" required>
								
								<label>Contact Number</label>
								<input name="contact_no" type="text" class="form-control" required>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">
										<i class="fa fa-plus-circle" aria-hidden="true"></i> Add Desk Person
									</button>
								</div>
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
<script src='js/bootstrap.min.js'></script>
<script>
	new WOW().init();
</script>