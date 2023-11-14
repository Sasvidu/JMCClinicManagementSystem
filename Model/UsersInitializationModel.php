<?php

    require_once "../Commons/JeevaniDB.php";
    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;

    //Define Pages
    if (isset($_GET['pageAdmins'])) {
        $pageAdmins = $_GET['pageAdmins'];
    } else {
        $pageAdmins = 1;
    }

    if (isset($_GET['pageDoctors'])) {
        $pageDoctors = $_GET['pageDoctors'];
    } else {
        $pageDoctors = 1;
    }

    if (isset($_GET['pagePatients'])) {
        $pagePatients = $_GET['pagePatients'];
    } else {
        $pagePatients = 1;
    }

    if (isset($_GET['pageClerks'])) {
        $pageClerks = $_GET['pageClerks'];
    } else {
        $pageClerks = 1;
    }
    
    //Define Limits:
    if(isset($_POST['limitSelectorAdmins'])){
        $_SESSION['limitAdmins'] = $_POST['limitSelectorAdmins'];
        $limitAdmins = $_POST['limitSelectorAdmins'];
        $pageAdmins = 1;
    }else{
        if(isset($_SESSION['limitAdmins'])){
            $limitAdmins = $_SESSION['limitAdmins'];
        }else{
            $_SESSION['limitAdmins'] = 10;
            $limitAdmins = 10;
        }
    }

    if(isset($_POST['limitSelectorDoctors'])){
        $_SESSION['limitDoctors'] = $_POST['limitSelectorDoctors'];
        $limitDoctors = $_POST['limitSelectorDoctors'];
        $pageDoctors = 1;
    }else{
        if(isset($_SESSION['limitDoctors'])){
            $limitDoctors = $_SESSION['limitDoctors'];
        }else{
            $_SESSION['limitDoctors'] = 10;
            $limitDoctors = 10;
        }
    }

    if(isset($_POST['limitSelectorPatients'])){
        $_SESSION['limitPatients'] = $_POST['limitSelectorPatients'];
        $limitPatients = $_POST['limitSelectorPatients'];
        $pagePatients = 1;
    }else{
        if(isset($_SESSION['limitPatients'])){
            $limitPatients = $_SESSION['limitPatients'];
        }else{
            $_SESSION['limitPatients'] = 10;
            $limitPatients = 10;
        }
    }

    if(isset($_POST['limitSelectorClerks'])){
        $_SESSION['limitClerks'] = $_POST['limitSelectorClerks'];
        $limitClerks = $_POST['limitSelectorClerks'];
        $pageClerks = 1;
    }else{
        if(isset($_SESSION['limitClerks'])){
            $limitClerks = $_SESSION['limitClerks'];
        }else{
            $_SESSION['limitClerks'] = 10;
            $limitClerks = 10;
        }
    }
        
    //Define Starting Points:
    $startAdmins = ($pageAdmins - 1) * $limitAdmins;
    $startDoctors = ($pageDoctors - 1) * $limitDoctors;
    $startPatients = ($pagePatients - 1) * $limitPatients;
    $startClerks = ($pageClerks - 1) * $limitClerks;

    //Fetch Admin Data:    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $pageAdmins = 0;
    
        $sqlAdmins = "SELECT * FROM user WHERE CONCAT(user_fname, user_lname, user_email, user_address, user_dob, user_nic) LIKE '%$filters%' AND user_status = 1 AND user_role_id = 1 ORDER BY user_id ASC;";
    
        $resultAdmins = $myCon->query($sqlAdmins) or die($myCon->error);
        $resCheckAdmins = mysqli_num_rows($resultAdmins);
    
        $admins = $resultAdmins->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sqlAdmins = "SELECT * FROM user WHERE user_status = 1 AND user_role_id = 1 ORDER BY user_id ASC LIMIT $startAdmins, $limitAdmins;";
        $resultAdmins = $myCon->query($sqlAdmins) or die($myCon->error);
        $resCheckAdmins = mysqli_num_rows($resultAdmins);
    
        $admins = $resultAdmins->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNewAdmins = "SELECT count(user_id) AS user_id FROM user WHERE user_status = 1 AND user_role_id = 1";
    $resultNewAdmins = $myCon->query($sqlNewAdmins) or die($myCon->error);
    $adminCount = $resultNewAdmins->fetch_all(MYSQLI_ASSOC);
    $totalAdmins = $adminCount[0]['user_id'];
    $pagesAdmins = ceil($totalAdmins / $limitAdmins);
    
    $previousAdmins = $pageAdmins - 1;
    $nextAdmins = $pageAdmins + 1;

    //Fetch Doctor Data:
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $pageDoctors = 0;
    
        $sqlDoctors = "SELECT * FROM user WHERE CONCAT(user_fname, user_lname, user_email, user_address, user_dob, user_nic) LIKE '%$filters%' AND user_status = 1 AND user_role_id = 2 ORDER BY user_id ASC;";
    
        $resultDoctors = $myCon->query($sqlDoctors) or die($myCon->error);
        $resCheckDoctors = mysqli_num_rows($resultDoctors);
    
        $doctors = $resultDoctors->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sqlDoctors = "SELECT * FROM user WHERE user_status = 1 AND user_role_id = 2 ORDER BY user_id ASC LIMIT $startDoctors, $limitDoctors;";
        $resultDoctors = $myCon->query($sqlDoctors) or die($myCon->error);
        $resCheckDoctors = mysqli_num_rows($resultDoctors);
    
        $doctors = $resultDoctors->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNewDoctors = "SELECT count(user_id) AS user_id FROM user WHERE user_status = 1 AND user_role_id = 2";
    $resultNewDoctors = $myCon->query($sqlNewDoctors) or die($myCon->error);
    $doctorCount = $resultNewDoctors->fetch_all(MYSQLI_ASSOC);
    $totalDoctors = $doctorCount[0]['user_id'];
    $pagesDoctors = ceil($totalDoctors / $limitDoctors);
    
    $previousDoctors = $pageDoctors - 1;
    $nextDoctors = $pageDoctors + 1;

    //Fetch Patient Data:
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $pagePatients = 0;
    
        $sqlPatients = "SELECT * FROM user WHERE CONCAT(user_fname, user_lname, user_email, user_address, user_dob, user_nic) LIKE '%$filters%' AND user_status = 1 AND user_role_id = 4 ORDER BY user_id ASC;";
    
        $resultPatients = $myCon->query($sqlPatients) or die($myCon->error);
        $resCheckPatients = mysqli_num_rows($resultPatients);
    
        $patients = $resultPatients->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sqlPatients = "SELECT * FROM user WHERE user_status = 1 AND user_role_id = 4 ORDER BY user_id ASC LIMIT $startPatients, $limitPatients;";
        $resultPatients = $myCon->query($sqlPatients) or die($myCon->error);
        $resCheckPatients = mysqli_num_rows($resultPatients);
    
        $patients = $resultPatients->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNewPatients = "SELECT count(user_id) AS user_id FROM user WHERE user_status = 1 AND user_role_id = 4";
    $resultNewPatients = $myCon->query($sqlNewPatients) or die($myCon->error);
    $patientCount = $resultNewPatients->fetch_all(MYSQLI_ASSOC);
    $totalPatients = $patientCount[0]['user_id'];
    $pagesPatients = ceil($totalPatients / $limitPatients);
    
    $previousPatients = $pagePatients - 1;
    $nextPatients = $pagePatients + 1;

    //Fetch Clerk Data:
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $pageClerks = 0;
    
        $sqlClerks = "SELECT * FROM user WHERE CONCAT(user_fname, user_lname, user_email, user_address, user_dob, user_nic) LIKE '%$filters%' AND user_status = 1 AND user_role_id = 3 ORDER BY user_id ASC;";
    
        $resultClerks = $myCon->query($sqlClerks) or die($myCon->error);
        $resCheckClerks = mysqli_num_rows($resultClerks);
    
        $clerks = $resultClerks->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sqlClerks = "SELECT * FROM user WHERE user_status = 1 AND user_role_id = 3 ORDER BY user_id ASC LIMIT $startClerks, $limitClerks;";
        $resultClerks = $myCon->query($sqlClerks) or die($myCon->error);
        $resCheckClerks = mysqli_num_rows($resultClerks);
    
        $clerks = $resultClerks->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNewClerks = "SELECT count(user_id) AS user_id FROM user WHERE user_status = 1 AND user_role_id = 3";
    $resultNewClerks = $myCon->query($sqlNewClerks) or die($myCon->error);
    $clerkCount = $resultNewClerks->fetch_all(MYSQLI_ASSOC);
    $totalClerks = $clerkCount[0]['user_id'];
    $pagesClerks = ceil($totalClerks / $limitClerks);
    
    $previousClerks = $pageClerks - 1;
    $nextClerks = $pageClerks + 1;