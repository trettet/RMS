<!-- console output
<?php
    session_start();
    require("sql_connect.php");
    require("utils/salt_generator.php");
    
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["lname"]) && isset($_POST["fname"]) && isset($_POST["mname"]) && isset($_POST["address"]) && isset($_POST["contact_no"]) ) 
    {
        $salt = generateSalt();
        $username = $_POST["username"];
        $password = hash('sha256', $_POST['password']);
        $password = hash('sha256', $password . $salt);
        
        $lname = $_POST["lname"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $address = $_POST["address"];
        $contact = $_POST["contact_no"];

        $q= "UPDATE users SET username='{$username}', password='{$password}', lname='{$lname}', fname='{$fname}', mname='{$mname}', address='{$address}', contact_no='{$contact}', salt='{$salt}' WHERE username='admin'";
        
        $result = mysqli_query($conn, $q);

        if($result){
            header("location:login.php");
        }else{
            header("error.php");
        }
    }
?>
-->
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
                    <form method='POST' action='setup.php'>
                        <div class='col-lg-5 col-lg-offset-1'>
                            <h4 class='header'>Let's change your LOGIN CREDENTIALS</h4>
                            <div class='info'>	
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                                        <input type='text' class='form-control' name='username' placeholder='Username' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        <input type='password' class='form-control' name='password' placeholder='Password' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        <input type='password' class='form-control' placeholder='Confirm Password' require>
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
                                        <input type='text' class='form-control' name='lname' placeholder='Last Name' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
                                        <input type='text' class='form-control' name='fname' placeholder='First Name' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
                                        <input type='text' class='form-control' name='mname' placeholder='Middle Name' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true"></i></div>
                                        <input type='text' class='form-control' name='address' placeholder='Address' require>
                                    </div>
                                </div>
                                <div class='form-group input'>
                                    <div class='input-group'>
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                        <input type='text' class='form-control' name='contact_no' placeholder='Contact Number' require>
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


