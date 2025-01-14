<?php

    //Verify the controller was accessed through a view element:
    if(!($_GET['status'] == 'true')){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Start the session:
        session_start();

        //Retrieve the link clicked from the ribbon:
        $action = $_POST['dashboard-submit'];

        if($action == "dashboard-submit-logout"){

            //If the action was to log out, first destory the session:
            session_destroy();

            //Send a message to the login page:
            $code = "Logged out successfully!";
            $code = base64_encode($code);
            header("location: ../View/Login.php?code=$code");

        }else if($action == "dashboard-submit-dashboard"){
            
            $role = $_SESSION['userRole'];

            if($role=="Patient"){
                header("location: ../View/PatientDashboard.php");
            }else if($role=="Admin"){
                header("location: ../View/AdminDashboard.php");
            }else if($role=="Clerk"){
                header("location: ../View/ClerkDashboard.php");
            }else if($role=="Doctor"){
                header("location: ../View/DoctorDashboard.php");
            }else{
                //If the role name is corrupted, go back to home page:
                session_destroy();
                $msg = "Something went wrong, please try logging in.";
                $msg = base64_encode($msg);
                header("location: ../View/Home.php?msg=$msg");
            }
           
        }else if($action == "dashboard-submit-medicine"){
            header("location: ../View/Medicine.php");
        }else if($action == "dashboard-submit-inventory"){
            header("location: ../View/Inventory.php");
        }else if($action == "dashboard-submit-suppliers"){
            header("location: ../View/Suppliers.php");
        }else if($action == "dashboard-submit-doctors"){
            header("location: ../View/Doctors.php");
        }else if($action == "dashboard-submit-users"){
            header("location: ../View/Users.php");
        }else if($action == "dashboard-submit-schedules"){

            $role = $_SESSION['userRole'];

            if($role=="Patient"){
                //header("location: ../View/Dashboard.php");
            }else if($role=="Admin"){
                header("location: ../View/Schedules.php");
            }else if($role=="Clerk"){
                header("location: ../View/Schedules.php");
            }else if($role=="Doctor"){
                header("location: ../View/DoctorSchedules.php");
            }else{
                //If the role name is corrupted, go back to home page:
                session_destroy();
                $msg = "Something went wrong, please try logging in.";
                $msg = base64_encode($msg);
                header("location: ../View/Home.php?msg=$msg");
            }

        }else if($action == "dashboard-submit-appointments"){

            $role = $_SESSION['userRole'];

            if($role=="Patient"){
                //header("location: ../View/Dashboard.php");
            }else if($role=="Admin"){
                header("location: ../View/Appointments.php");
            }else if($role=="Clerk"){
                header("location: ../View/Appointments.php");
            }else if($role=="Doctor"){
                header("location: ../View/DoctorAppointments.php");
            }else{
                //If the role name is corrupted, go back to home page:
                session_destroy();
                $msg = "Something went wrong, please try logging in.";
                $msg = base64_encode($msg);
                header("location: ../View/Home.php?msg=$msg");
            }

            
        }else if($action == "dashboard-submit-prescription-view"){
            header("location: ../View/Prescriptions.php");
        }else if($action == "dashboard-submit-patient-view"){
            $userId = $_SESSION['userId'];
            header("location: ../View/PatientMedicalInfo.php?id=$userId");
        }else if($action == "dashboard-submit-appointment-view"){
            header("location: ../View/PatientAppointments.php?id=$userId");
        }else{

            //If the action is not defined, go back to home page:
            session_destroy();

            $msg = "Something went wrong, please try logging in.";
            $msg = base64_encode($msg);
            header("location: ../View/Home.php?msg=$msg");

        }

    }

?>