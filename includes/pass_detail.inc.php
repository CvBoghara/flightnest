<?php
session_start();
if(isset($_POST['pass_but']) && isset($_SESSION['userId'])) {
    require '../helpers/init_conn_db.php';  
    
    // Validate that user exists in the database
    $user_id = $_SESSION['userId'];
    $check_user_sql = 'SELECT user_id FROM users WHERE user_id = ?';
    $check_stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($check_stmt, $check_user_sql)) {
        header('Location: ../pass_form.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($check_stmt, 'i', $user_id);
        mysqli_stmt_execute($check_stmt);
        $user_result = mysqli_stmt_get_result($check_stmt);
        
        if(!mysqli_fetch_assoc($user_result)) {
            // User doesn't exist in database, redirect to login
            header('Location: ../login.php?error=sessionexpired');
            exit();
        }
    }
    
    $mobile_flag = false;
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers'];
    $mob_len = count($_POST['mobile']);
    for($i=0;$i<$mob_len;$i++) {
        if(strlen($_POST['mobile'][$i]) !== 10) {
            $mobile_flag = true;
            break;            
        }
    }
    if($mobile_flag) {
        header('Location: ../pass_form.php?error=moblen');
        exit();         
    }
    $date_len = count($_POST['date']);
    for($i=0;$i<$date_len;$i++) {
        $dob = new DateTime($_POST['date'][$i]);
        $today = new DateTime('today');
        if ($dob >= $today) {
            header('Location: ../pass_form.php?error=invdate');
            exit();
        }
    }        
   $stmt = mysqli_stmt_init($conn);
    $sql = 'SELECT passenger_id FROM passenger_profile';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../pass_form.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $pass_id = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $pass_id = $row['passenger_id'];
        }
    }
    $pass_id++;
    $stmt = mysqli_stmt_init($conn);
    $flag = false;
    for($i=0;$i<$date_len;$i++) {
        $sql = 'INSERT INTO passenger_profile (user_id,mobile,dob,f_name,
        m_name,l_name,flight_id) VALUES (?,?,?,?,?,?,?);';            
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ../pass_form.php?error=sqlerror');
            exit();            
        } else {
            mysqli_stmt_bind_param($stmt,'iissssi',$_SESSION['userId'],
                $_POST['mobile'][$i],$_POST['date'][$i],$_POST['firstname'][$i],
                $_POST['midname'][$i],$_POST['lastname'][$i],$flight_id);                           
            if(!mysqli_stmt_execute($stmt)) {
                // Log the error for debugging
                error_log("Passenger profile insertion failed: " . mysqli_stmt_error($stmt));
                header('Location: ../pass_form.php?error=insertfailed');
                exit();
            }
            $flag = true;        
        }
    }   
    if($flag) {
        $_SESSION['flight_id'] = $flight_id;
        $_SESSION['class'] = $_POST['class'];
        $_SESSION['passengers'] = $passengers;
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['ret_date'] = $_POST['ret_date'];
        $_SESSION['pass_id'] = $pass_id;
        header('Location: ../payment.php');
        exit();          
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    

} else {
    header('Location: ../pass_form.php');
    exit();  
}