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
        <style>
            .col-lg-12{
                padding: 0px;
            }
            #titlebar{
                height: 90px;
                width: 100%;
                background-color: #313541;
            }
            #cname{
                color: #fafafa;
                margin: 0px;
                padding-top: 20px;
                padding-left: 100px;
            }
            #title{
                color: white;
                margin: 0px;
                padding-top: 20px;
                padding-left: 100px;
            }
            #custotype{
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class='container-fluid'>
            <!--STUFF INSIDE THE PAGE-->
            <div class='row'>
                <div class='col-lg-12'>
                    <div id='titlebar'>
                        <h5 id='cname'>S U N V I E W &nbsp R E S I D E N C E S &nbsp A N D &nbsp C O M E R C I A L &nbsp S P A C E S</h5>
                        <h3 id='title'>A D M I N ' S &nbsp P A G E</h3>
                    </div>
                </div>
            </div>
            <!--ADD CUSTOMER-->
            <label id='custotype'>CUSTOMER (BUSINESS)</label>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>Business Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Options</th>
                </tr>
                </thead>
                <tbody>
            <?php
                $query2 = "SELECT c.customer_id, cb.business_name, c.address, c.contact_no FROM customers as c, customer_business as cb WHERE c.customer_id = cb.customer_id";
                $fetch2 = mysqli_query($conn, $query2);
                
                $row = $fetch2->fetch_assoc();
                echo "<tr>";
                      foreach($row as $key => $value){
                          if($key != "customer_id"){
                            echo "<td>".$value."</td>";
                          }
                          
                      }
                      echo "<td>
                                <input type='hidden' value='{$row["customer_id"]}'>
                                <button type='button' class='btn '>
                                    <i class='fa fa-pencil-square' aria-hidden='true'></i>
                                </button>
                                <button type='button' class='btn d_cus'>
                                    <i class='fa fa-remove' aria-hidden='true'></i>
                                </button>
                           </td>";
                      
                echo "</tr>";
            ?>
            </tbody>
            </table>
            <!--MODAL TRIGGER BUTTONS-->
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
                <button type='button' class='btn btn-success' data-toggle="modal" data-target="#add_customer">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD CUSTOMER  
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
                                            $query = "SELECT username FROM users";
                                            $fetch = mysqli_query($conn, $query);
                                            
                                            if($fetch->num_rows > 0){
                                                while($dp = $fetch->fetch_assoc()){
                                                    echo "<option>{$dp["username"]}</option>";
                                                }
                                            }
                                            
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
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
                                            $query = "SELECT building_name FROM buildings";
                                            $fetch = mysqli_query($conn, $query);
                                            
                                            if($fetch->num_rows > 0){
                                                while($bid = $fetch->fetch_assoc()){
                                                    echo "<option>{$bid["building_name"]}</option>";
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
                                    <button type="submit" class="btn btn-success">
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
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Desk Person
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--ADD CUSTOMER MODAL-->
            <div id="add_customer" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ADD CUSTOMER</h4>
                        </div>
                        <div class="modal-body">
                            <form method='POST' action='add_dp.php'>
                                <div class="radio">
                                    <label>Individual
                                        <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">
                                    </label>
                                    <label>Business
                                        <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="...">
                                    </label>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
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
    
    $(document).ready(function(){
        $(".d_cus").on("click", function(){
            var conf = confirm("Are you sure you want to DELETE this CUSTOMER?");
            if(conf){
                var row = $(this).prev().prev().val();
                $.ajax({
                    url: "delete_customer.php",
                    type: "POST",
                    data: {customer_id : row},
                    success: function(retval){
                        if(retval == 1){
                            alert("Customer deleted!");
                            $(".d_cus").prev().prev().parent().parent().remove();
                        }else{
                            alert("Delete unsuccessful, please try again.");
                        }
                    }
                });
            }
        });
    });
</script>