<?php
require '../../helpers/init_conn_db.php';
session_start();
if(isset($_SESSION['adminId'])) {
    if(isset($_POST['dep_but'])) {
        $flight_id = $_POST['flight_id'];
        $sql = "UPDATE Flight SET status='dep' WHERE flight_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php');
        exit();
    }else if(isset($_POST['issue_but'])) {
        $flight_id = $_POST['flight_id'];
        $issue = $_POST['issue'];
        $delay_time = gmdate('h:i:s',(int)$issue*60);
        $sql = 'SELECT * FROM Flight WHERE flight_id=?';
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);              
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
            $date_time_dep = $row['departure'];
            $date_dep = substr($date_time_dep,0,10);
            $time_dep = substr($date_time_dep,10,6) ;    
            $date_time_arr = $row['arrivale'];
            $date_arr = substr($date_time_arr,0,10);
            $time_arr = substr($date_time_arr,10,6) ; 
            $time_dep = new DateTime($date_time_dep);
            $time_dep->add(new DateInterval('PT' . $issue . 'M'));            
            $stamp_dep = $time_dep->format('Y-m-d H:i:s');         
            $time_arr = new DateTime($date_time_arr);
            $time_arr->add(new DateInterval('PT' . $issue . 'M'));            
            $stamp_arr = $time_arr->format('Y-m-d H:i:s');                               
            $sql = "UPDATE Flight SET status='issue',issue=?,departure=?,arrivale=?
                WHERE flight_id=?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,'sssi',$issue,$stamp_dep,$stamp_arr,$flight_id);
            mysqli_stmt_execute($stmt);

            // Send delay/technical issue notification to affected users
            require '../../helpers/email_helper.php';
            $sql_users = "SELECT DISTINCT u.email FROM Users u
                          INNER JOIN ticket t ON u.user_id = t.user_id
                          WHERE t.flight_id = ?";
            $stmt_users = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt_users, $sql_users);
            mysqli_stmt_bind_param($stmt_users, 'i', $flight_id);
            mysqli_stmt_execute($stmt_users);
            $result_users = mysqli_stmt_get_result($stmt_users);
            while ($user = mysqli_fetch_assoc($result_users)) {
                $subject = 'FlightNest - Flight Delay/Technical Issue';
                $body = "
                    <h2>Flight Delay/Technical Issue</h2>
                    <p>Dear Passenger,</p>
                    <p>We regret to inform you that your flight has been delayed due to technical issues.</p>
                    <p>New Departure: $stamp_dep<br>New Arrival: $stamp_arr</p>
                    <p>We apologize for the inconvenience.</p>
                    <p>Best regards,<br>FlightNest Team</p>
                ";
                sendEmail($user['email'], $subject, $body);
            }
            mysqli_stmt_close($stmt_users);

            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('Location: ../../admin/index.php');
            exit();
        }        
    } else if(isset($_POST['issue_soved_but'])) {
      $flight_id = $_POST['flight_id'];
      $sql = "UPDATE Flight SET status='',issue='solved' WHERE flight_id=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt,$sql);
      mysqli_stmt_bind_param($stmt,'i',$flight_id);
      mysqli_stmt_execute($stmt);

      // Send technical issue resolved notification to affected users
      require '../../helpers/email_helper.php';
      $sql_users = "SELECT DISTINCT u.email FROM Users u
                    INNER JOIN ticket t ON u.user_id = t.user_id
                    WHERE t.flight_id = ?";
      $stmt_users = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt_users, $sql_users);
      mysqli_stmt_bind_param($stmt_users, 'i', $flight_id);
      mysqli_stmt_execute($stmt_users);
      $result_users = mysqli_stmt_get_result($stmt_users);
      while ($user = mysqli_fetch_assoc($result_users)) {
          $subject = 'FlightNest - Technical Issue Resolved';
          $body = "
              <h2>Technical Issue Resolved</h2>
              <p>Dear Passenger,</p>
              <p>The technical issue with your flight has been resolved. Your flight will proceed as scheduled.</p>
              <p>Thank you for your patience.</p>
              <p>Best regards,<br>FlightNest Team</p>
          ";
          sendEmail($user['email'], $subject, $body);
      }
      mysqli_stmt_close($stmt_users);

      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      header('Location: ../../admin/index.php');
      exit();
    } else if(isset($_POST['arr_but'])) {
      $flight_id = $_POST['flight_id'];
      $issue = $_POST['issue'];
      $sql = "UPDATE Flight SET status='arr'WHERE flight_id=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt,$sql);
      mysqli_stmt_bind_param($stmt,'i',$flight_id);
      mysqli_stmt_execute($stmt);

      // Send flight arrival notification to affected users
      require '../../helpers/email_helper.php';
      $sql_users = "SELECT DISTINCT u.email FROM Users u
                    INNER JOIN ticket t ON u.user_id = t.user_id
                    WHERE t.flight_id = ?";
      $stmt_users = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt_users, $sql_users);
      mysqli_stmt_bind_param($stmt_users, 'i', $flight_id);
      mysqli_stmt_execute($stmt_users);
      $result_users = mysqli_stmt_get_result($stmt_users);
      while ($user = mysqli_fetch_assoc($result_users)) {
          $subject = 'FlightNest - Your Flight is Arriving Soon';
          $body = "
              <h2>Flight Arrival Notification</h2>
              <p>Dear Passenger,</p>
              <p>Your flight is arriving soon. Please proceed to the arrival area.</p>
              <p>Safe travels!</p>
              <p>Best regards,<br>FlightNest Team</p>
          ";
          sendEmail($user['email'], $subject, $body);
      }
      mysqli_stmt_close($stmt_users);

      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      header('Location: ../../admin/index.php');
      exit();
    } else {
        header('Location: ../../admin/index.php');
        exit();
    }
}else {
    header('Location: ../../admin/index.php');
    exit();
}
