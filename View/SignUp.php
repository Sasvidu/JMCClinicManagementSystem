<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jeevani Medical Center</title>

    <!--Link Imported Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <!--Link Original Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../CSS/SignUpStyles.css">

    <!--Link to Original Script -->
    <script defer src="../JS/SignUpJS.js"></script>

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

                    <div class="col-12">
                        &nbsp;
                        <!--Display empty row when when message is not available -->
                    </div>

                <?php
            }
            ?>
            <!--Alert Box End-->

        </div>

        <div class="row">

            <div class="col-md-3 col-sm-0">

            </div>

            <div class="col-md-6 col-sm-12 flexer">

                <form action="../Controller/SignUpController.php?status=true" method ="post" class="panel">
                
                    <div class="panel-heading">

                        <div class="row">

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <h3 class="panel-title" align="center">Sign Up</h3>

                        </div>
                        
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>First Name:</label></div>
                            <div class="col-12">
                                <input id="firstname" name="firstname" type="text" class="form-control">
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Last Name:</label></div>
                            <div class="col-12">
                                <input id="lastname" name="lastname" type="text" class="form-control">
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Username:</label></div>
                            <div class="col-12">
                                <input id="username" name="username" type="email" class="form-control" onclick="getEmailHelper()">
                                <small id="emailHelper"></small>
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Date Of Birth:</label></div>
                            <div class="col-12">
                                <input id="dateofbirth" name="dateofbirth" type="date" class="form-control">
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Address:</label></div>
                            <div class="col-12">
                                <input id="address" name="address" type="text" class="form-control">
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>National Identity Card No:</label></div>
                            <div class="col-12">
                                <input id="nic" name="nic" type="text" class="form-control">
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Password:</label></div>
                            <div class="col-12 flexer">                                
                                <input id="password" name="password" type="password" class="form-control">
                                <i id="eye-icon1" class="fa-solid fa-eye" onclick="showPasswordFunction()"></i>
                            </div>

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><label>Confirm Password:</label></div>
                            <div class="col-12 flexer">                                
                                <input id="rePassword" name="rePassword" type="password" class="form-control">
                                <i id="eye-icon2" class="fa-solid fa-eye" onclick="showRePasswordFunction()"></i>
                            </div>
                            
                        </div>

                        <div class="row">

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

                                <button id="submit" name="submit" type="submit" class="btn btn-block btn-submit">Create Account</button>

                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-md-3 col-sm-0">

            </div>

        </div>

        <div class="row">

            <div class="col-12">
                &nbsp;
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

            <div class="col-12">
                &nbsp;
            </div>

        </div>

    </div>

    <div id="div-home">

        <a href="../index.html" style="text-decoration: none;">
            
            <button class="btn-home flexer"><i id="arrow-icon" class="fa-solid fa-arrow-left fa-beat"></i></button>
        
        </a>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</body>


</html>