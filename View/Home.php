<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jeevani Medical Center</title>

    <!--Link Imported Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <!--Link Original Stylesheets -->
	<link rel="stylesheet" type="text/css" href="../CSS/HomeStyles.css">

    <!--Link to Original Script -->
    <script defer src="../JS/HomeJS.js"></script>

    <!--Link to fontawesome icons -->
    <script src="https://kit.fontawesome.com/0c49cb8566.js" crossorigin="anonymous"></script>

</head>


<body>

    <section id="navigationSection" class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="#">
                <img class="logo" src="../../ECommerceSystem/Commons/Icons/logotest.png" alt="logo" width="50px" height="50px">
            </a>

            <span class="navbar-brand-text">Jeevani Medical Center</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse collapseditems" id="navbarSupportedContent">

                <form action="../Controller/HomeController.php?status=true" method="post">
                    <ul class="navbar-nav mr-auto navLinks">

                        <li id="nav1" class="nav-item">
                            <a class="nav-link" href="#"> <button class="btn btnToTxtLogin" type="submit" name="submit" value="navLogin"> Login </button> </a>
                        </li>

                        <li id="nav2" class="nav-item">
                            <a class="nav-link" href="#"> <button class="btn btnToTxtSignUp" type="submit" name="submit" value="navSignup"> Sign Up </button> </a>
                        </li>

                    </ul>
                </form>

            </div>

        </nav>

    </section>

    <section id="Intro-panel" class="container-fluid">

        <div class="row">

            <div class="col-12">
                &nbsp;
            </div>

        </div>

        <div class="row">

            <div class="welcome-panel animatedPanel">

                <div class="col-12">
                    <br>
                    <p>
                        <h1 class="welcome-heading">Make an <span class="appointment-text">appointment</span> today!</h1>
                        <br>
                        Please <span class="badge welcome-badge">Login</span> to make an appointment.
                        <br>
                        If you don't have an account, <span class="badge welcome-badge">Sign Up!</span>
                    </p>
                </div>

                <div class="col-12">
                    &nbsp;
                </div>

                <div class="col-12">
                    &nbsp;
                </div>

                <form action="../Controller/HomeController.php?status=true" method="post">

                <div class="col-12 flexer">

                    

                        <button class="btn btn-login" onmouseover="LoginAnimate()" onmouseleave="LoginDeAnimate()" type="submit" name="submit" value="Login">
                            <i id="loginIcon" class="fa-solid fa-right-to-bracket"></i>
                            <span id="loginText">&nbsp;&nbsp;Login</span>
                        </button>

                        &nbsp;&nbsp;&nbsp;

                        <button class="btn btn-signup" onmouseover="SignUpAnimate()" onmouseleave="SignUpDeAnimate()" type="submit" name="submit" value="Signup">
                            <i id="signupIcon" class="fa-solid fa-user-plus"></i>
                            <span id="signupText">&nbsp;&nbsp;Sign Up</span>
                        </button>

                </div>

                </form>

                <br>

            </div>

        </div>

    </section>

    <section class="container">

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

        </div>

        <div class="row">

            <div class="col-12 flexer">
                <h1 class="About-Heading hidden">Clinic Management System</h1>
            </div>
            
            <div class="col-12 ">
                &nbsp;
            </div>

            <div class="col-12">
                
                <div class="row flexer">

                    <div class="col-4">

                        <div class="card hidden">

                            <img class="card-img-top cardImage" src="../Commons/Icons/Patient.png" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Patients</h5>

                                <p class="card-text">Login as a patient to the system and keep track of your medical information by recording them.</p>
                                
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-4">

                        <div class="card hidden">

                            <img class="card-img-top cardImage" src="../Commons/Icons/doctor.jpg" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Doctors</h5>

                                <p class="card-text">The island's best doctors are ready to serve you at Jeevani Medical Center.</p>
                                
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-4">

                        <div class="card hidden">

                            <img class="card-img-top cardImage" src="../Commons/Icons/appointment-icon-16.jpg" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Appointments</h5>

                                <p class="card-text">Instantly book appointments with out doctors in advance by using out system!</p>
                                
                            </div>
                            
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12">
                        &nbsp;
                    </div>

                    <div class="col-12">
                        &nbsp;
                    </div>

                </div>

                <div class="row flexer">

                    <div class="col-2 hidden">&nbsp;</div>

                    <div class="col-4 hidden">

                        <div class="card">

                            <img class="card-img-top cardImage" src="../Commons/Icons/Prescription.jpg" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Prescriptions</h5>

                                <p class="card-text">All the prescriptions issued will be stored and kept track of by us.</p>
                                
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-4 hidden">

                        <div class="card">

                            <img class="card-img-top cardImage" src="../Commons/Icons/report.jpg" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Reports</h5>

                                <p class="card-text">You can download reports with details about appointments and prescriptions using the system online.</p>
                                
                            </div>
                            
                        </div>

                    </div>

                    <div class="col-2 hidden">&nbsp;</div>

                </div>

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

        <div class="row">

            <div class="col-12 flexer">
                <h1 class="About-Heading hidden">Get in Touch</h1>
            </div>
            
            <div class="col-12">
                &nbsp;
            </div>

            <div class="row flexer">

                <div class="col-4">

                    <div class="card hidden">

                        <img class="card-img-top cardImage" src="../Commons/Icons/Address.png" alt="Card image cap">

                        <div class="card-body">

                            <h5 class="card-title">Address</h5>

                            <p class="card-text">112, Highlevel Road, Kottawa</p>
                                
                        </div>
                            
                    </div>

                </div>

                <div class="col-4">

                    <div class="card hidden">

                        <img class="card-img-top cardImage" src="../Commons/Icons/Email.jpeg" alt="Card image cap">

                        <div class="card-body">

                            <h5 class="card-title">Email</h5>

                            <p class="card-text">eyasa1979@gmail.com</p>
                                
                        </div>
                            
                    </div>

                </div>

                <div class="col-4">

                    <div class="card hidden">

                        <img class="card-img-top cardImage" src="../Commons/Icons/Phone.jpg" alt="Card image cap">

                            <div class="card-body">

                                <h5 class="card-title">Phone</h5>

                                <p class="card-text">0773544499</p>
                                
                            </div>
                            
                        </div>

                    </div>
                
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12">
                &nbsp;
            </div>

            <div class="col-12">
                &nbsp;
            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php

    if (isset($_GET['msg'])) {
        $msg = base64_decode($_GET['msg']);
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    ?>

</body>


</html>