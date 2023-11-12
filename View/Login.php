<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jeevani Medical Center</title>

    <!--Link Imported Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <!--Link Original Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../CSS/LoginStyles.css">

    <!--Link to Original Script -->
    <script defer src="../JS/LoginJS.js"></script>

     <!--Link to fontawesome icons -->
     <script src="https://kit.fontawesome.com/0c49cb8566.js" crossorigin="anonymous"></script>
</head>


<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                &nbsp;
            </div>

            <!--Alert Box Start-->
            <?php

            if (isset($_REQUEST["msg"])) {
                $msg = ($_GET["msg"]);
                $msg = base64_decode($msg);
                ?>

                    <div class="col-12 alert alert-danger" id="alertBox">
                        <p id="alert" class="noMargin">
                            <?php echo $msg; ?>
                            <!--Display only when message is available -->
                        </p>
                    </div>

                <?php
            } 
            else if (isset($_REQUEST["code"])) {
                $code = ($_GET["code"]);
                $code = base64_decode($code);
                ?>

                    <div class="col-12 alert alert-success" id="alertBox">
                        <p id="alert" class="noMargin">
                            <?php echo $code; ?>
                            <!--Display only when message is available -->
                        </p>
                    </div>

                <?php
            } else {
                ?>

                    <!--Display empty row when when message is not available -->

                    <div class="col-12">
                        &nbsp;
                    </div>
                    
                    <div class="col-12">
                        &nbsp;
                    </div>

                <?php
            }
            ?>
            <!--Alert Box End-->

        </div>

        <div class="row">

            <div class="col-md-4 col-sm-0">

            </div>

            <div class="col-md-4 col-sm-12 flexer">

                <form action="../Controller/LoginController.php?status=true" method ="post" class="panel">
                
                    <div class="panel-heading">

                        <div class="row">

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <h3 class="panel-title" align="center">Login</h3>

                        </div>
                        
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">

                                <label>Username:</label>

                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                
                                <input id="username" name="username" type="email" class="form-control" onclick="getEmailHelper()">
                                <small id="emailHelper"></small>

                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>


                            <div class="col-12">

                                <label>Password:</label>
                                
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12 flexer">
                                
                                <input id="password" name="password" type="password" class="form-control">
                                <i id="eye-icon" class="fa-solid fa-eye" onclick="showPasswordFunction()"></i>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <small><a id="passwordHelper" onclick="showForgotPasswordModal()">Forgot Password?</a></small>
                            
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12 flexer">

                                <button id="submit" name="submit" type="submit" class="btn btn-block btn-submit" onmouseover="loginHoverfunction()" onmouseleave="loginDeHoverfunction()">Submit</button>

                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-md-4 col-sm-0">

            </div>

        </div>

    </div>

    <div id="div-home">

        <a href="../index.html" style="text-decoration: none;">
            
            <button class="btn-home flexer"><i id="arrow-icon" class="fa-solid fa-arrow-left fa-beat"></i></button>
        
        </a>
        
    </div>


    <!-- Modals -->

    <?php

        include_once "ForgotPasswordModal.php";

    ?>

    <!-- Modals end-->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>


</html>