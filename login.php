<?php
    session_start();
    require('sql_connect.php');
    $defaultPass = '81047da812978a25c421a0b592033a644949817f2e6fba24fbdb5c2bb4a5f60e';
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $status = '';
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        
        $query = "SELECT password, salt FROM users WHERE username='{$username}'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPass = hash('sha256', $password . $row['salt']);
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
    } else {
        $query = "SELECT password, salt FROM users WHERE username='admin'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPass = hash('sha256', $password . $row['salt']);
                if (strcasecmp($defaultPass, $row['password']) == 0) {
                    header('location: setup.php');
                }
            } else {
                $status = 'Warning! No Admin user found!';
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
                    <?php
                        if(isset($status)) {
                            echo "<div class='form-group'>";
                            echo "Tis is temporary (we should use div class alert)" . $status;
                            echo "</div>";
                        }
                    ?>
                    <div class='form-group'>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                            <input type='text' name='username' class='form-control' placeholder='Username'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                            <input type='password' name='password' class='form-control' placeholder='Password'>
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