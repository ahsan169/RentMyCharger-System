<?php
if (isset($_GET['error'])) {
    error();
}

?>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
    #login {
      background-color: white;
      border: none;  
      color:#12143D;
      border-bottom: 1px solid #12143D;
      border-radius: 0px;
      padding-left: 0px;
      padding-right: 0px;
      padding-bottom: 0px;
    }
    #registerHome {
      border-color: #12143D;  
      background-color:#12143D;
    }
</style>
</head>

<body style='background-color: whitesmoke '>

    <div style="margin-top:120px;"></div>


    <div class="container-fluid p-5">

        <?php
        function error()
        {
            echo "<div class='container p-3'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Sorry!</strong> Please check your email or password.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button></div></div>";
        }

        ?>
        <center>
        <div class="col-6">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">

                    <div class="card p-5">
                        <div class="card-body">
                            <h2 class="card-title text-center pb-3">Rental User Login</h2>
                            <h6 class="card-title text-center pb-3">Can I borrow your Charger?</h6>
                            <form action="../loginController.php" method="POST">
                                <input type="hidden" name="action1" value="login_rental_user">

                                <?php if (!empty($msg)) {
                                    echo $msg;
                                } ?>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="RUUserName" id="RUUserName" placeholder="Username" />
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="RUPassword" id="RUPassword" placeholder="Password" />
                                </div>

                                <div class="form-group pt-3">
                                    <button name="submit" type="submit" id="registerHome" class="btn btn-primary btn-lg btn-block">Login</button>

                                </div>
                                     <input type="button" value="New User? Register!" id="login" class="btn btn-warning fw-bold" onClick="window.location = 'register_rental_user.php'" />

                            </form>

                        </div>

                    </div>
                </div>
                <!-- <div class="col-1"></div> -->
            
            </div>

        </div>
        </center>
    </div>


    </div>


</body>

</html>